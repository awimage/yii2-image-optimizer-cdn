<?php
/**
 * @link https://www.awimage.com/
 * @copyright Copyright (c) 2020 Think Y LLC
 * @license https://www.awimage.com/license/
 */


namespace awimage\imageOptimizer;

use Detection\MobileDetect as AWMobileDetect;
use yii\helpers\Html;


/**
 * Img is the html tag img widget for awimage cdn service
 *
 * This tag allow to to size optimized images for any device based on their window size
 * This class detect the type of device (Mobile|Tablet|Desktop) and use the awimage service
 * to resize and deploy over the CDN the new image improving your performance when delivers
 * images to your clients
 *
 * For more details and usage information visit our github page
 *
 * @author Pablo Nuñez <pablo@awimage.com>
 * @since 1.0
 */
class Img extends \yii\base\Widget
{

    const ENDPOINT_URL = "https://cdn.awimage.com/v1/resize";
    public $MaxWidthForMobile = '480';
    public $MaxWidthForTablet = '920';
    public $MaxWidthForDesktop = '1920';

    public $src;
    public $options = [];

    public static function widget($config = [])
    {
        $image = new Img();
        return $image->echo($config["src"], $config);
    }

    public function echo($src, $config = [])
    {
        $this->TrySetProperties($config);
        $source = $this->getUrl($src, $config);
        return Html::img($source,
            array_merge(
                ['onerror' => "this.onerror=null;this.src='" . $src . "';"],
                $this->options)
        );
    }

    private function GetSize()
    {
        $mobile_detect = new AWMobileDetect();
        if ($mobile_detect->isTablet()) {
            return "/width/$this->MaxWidthForTablet";
        } elseif ($mobile_detect->isMobile()) {
            return "/width/$this->MaxWidthForMobile";
        } else {
            return "/width/$this->MaxWidthForDesktop";
        }
    }

    private function TrySetProperties($config = [])
    {
        $this->MaxWidthForMobile = $config["MaxWidthForMobile"] ?? $this->MaxWidthForMobile;
        $this->MaxWidthForTablet = $config["MaxWidthForTablet"] ?? $this->MaxWidthForTablet;
        $this->MaxWidthForDesktop = $config["MaxWidthForDesktop"] ?? $this->MaxWidthForDesktop;
        $this->options = $config["options"] ?? $this->options;
    }

    public function getUrl($src, $config = [])
    {
        $this->TrySetProperties($config);
        $size = $this->GetSize();
        return join([
            self::ENDPOINT_URL,
            $size,
            '/withoutEnlargement:true',
            '/',
            $src,
        ]);
    }

}
