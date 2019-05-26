<?php
namespace App\Utilities;
use Image as InterventionImage;
use Illuminate\Filesystem\FilesystemAdapter;

class Image{

    const TYPE_FIXED_WIDTH = 0;
    const TYPE_THUMBNAIL = 1;

    // 图片重置尺寸
    public static function resize($path, $type, FilesystemAdapter $storage, $config){

        $image = InterventionImage::make($path);
        $result = null;
        switch ($type) {
            case Image::TYPE_FIXED_WIDTH:
                $result = Image::toFixedWidth($image, $config);
                break;
            case Image::TYPE_THUMBNAIL:
                $result = Image::toThumbnail($image, $config);
                break;
            default:
                throw new \Exception("unkown type");
                break;
        }
        $storage->put($config['name'], (string) $result->encode());
    }

    // 生成固定宽度的图片
    public static function toFixedWidth($image, $size){
        $width = 0; $height = 0;
        if($image->width() < $width)
            return $image;
        $width = $size['width'];
        $height = (int) $image->height() * ($size['width'] / $image->width()); //长图
        return $image->resize($width, $height);
    }

    // 生成缩略图 策略等比例
    public static function toThumbnail($image, $size){
        $width = 0; $height = 0;
        if($image->width() / $image->height() > $size['width'] / $size['height']){
            $width = $size['width'];
            $height = (int) $image->height() * ($size['width'] / $image->width()); //长图
        }else{
            $height =$size['height'];
            $width = (int) $image->width() * ($size['height'] / $image->height()); //高图
        }

        return $image->resize($width, $height);
    }
}