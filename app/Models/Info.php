<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Info extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $appends = [
        'logo',
        'footer',
        'how_video',
        'favicon',
        'get_quote_photo',
        'about_photo',
        'about_video',
        'support',
    ];

    public $table = 'info';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'keywords_en',
        'keywords_ar',
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'address',
        'phone',
        'email',
        'vision_en',
        'vision_ar',
        'get_quote_introduction_en',
        'get_quote_introduction_ar',
        'get_quote_paragraph_en',
        'get_quote_paragraph_ar',
        'get_quote_sub_title_en',
        'get_quote_sub_title_ar',
        'call_action_en',
        'call_action_ar',
        'testimonial_en',
        'testimonial_ar',
        'google_rate',
        'portfolio_en',
        'portfolio_ar',
        'article_en',
        'article_ar',
        'faq_en',
        'faq_ar',
        'about_title_en',
        'about_title_ar',
        'about_description_en',
        'about_description_ar',
        'about_full_description_en',
        'about_full_description_ar',
        'important_pop_up_title_en',
        'important_pop_up_title_ar',
        'important_pop_up_description_en',
        'important_pop_up_description_ar',
        'support_title_en',
        'support_title_ar',
        'support_description_en',
        'support_description_ar',
        'support_brief_en',
        'support_brief_ar',
        'mobile',
        'contact_email',
        'daily_work',
        'daily_hours',
        'map',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(50)->format('webp');
        $this->addMediaConversion('thumb_logo')->width(140)->format('webp');
        $this->addMediaConversion('thumb_support')->width(266)->format('webp');
        $this->addMediaConversion('thumb_footer')->width(165)->format('webp');
        $this->addMediaConversion('thumb_favicon')->width(20)->format('webp');
        $this->addMediaConversion('thumb_get_quote')->width(1296)->format('webp');
        $this->addMediaConversion('thumb_how_photo')->width(750)->format('webp');
        $this->addMediaConversion('thumb_about_photo')->width(340)->format('webp');
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();

        if ($file) {
            if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1") {
                $file->url       = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl(''));
                $file->thumbnail = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl('thumb_logo'));
            } else {
                $file->url = str_replace('localhost', 'localhost:8000', $file->getUrl());
                $file->thumbnail = str_replace('localhost', 'localhost:8000', $file->getUrl('thumb_logo'));
            }
        }

        return $file;
    }

    public function getSupportAttribute()
    {
        $file = $this->getMedia('support')->last();

        if ($file) {
            if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1") {
                $file->url       = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl(''));
                $file->thumbnail = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl('thumb_support'));
            } else {
                $file->url = str_replace('localhost', 'localhost:8000', $file->getUrl());
                $file->thumbnail = str_replace('localhost', 'localhost:8000', $file->getUrl('thumb_support'));
            }
        }

        return $file;
    }

    public function getFooterAttribute()
    {
        $file = $this->getMedia('footer')->last();

        if ($file) {
            if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1") {
                $file->url       = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl(''));
                $file->thumbnail = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl('thumb_footer'));
            } else {
                $file->url = str_replace('localhost', 'localhost:8000', $file->getUrl());
                $file->thumbnail = str_replace('localhost', 'localhost:8000', $file->getUrl('thumb_footer'));
            }
        }

        return $file;
    }

    public function getHowPhotoAttribute()
    {
        $file = $this->getMedia('how_photo')->last();

        if ($file) {
            if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1") {
                $file->url       = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl(''));
                $file->thumbnail = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl('thumb_how_photo'));
            } else {
                $file->url = str_replace('localhost', 'localhost:8000', $file->getUrl());
                $file->thumbnail = str_replace('localhost', 'localhost:8000', $file->getUrl('thumb_how_photo'));
            }
        }

        return $file;
    }

    public function getHowVideoAttribute()
    {
        $file = $this->getMedia('how_video')->last();

        if ($file) {
            if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1") {
                $file->url = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl(''));
            } else {
                $file->url = str_replace('localhost', 'localhost:8000', $file->getUrl());
            }
        }

        return $file;
    }

    public function getFaviconAttribute()
    {
        $file = $this->getMedia('favicon')->last();

        if ($file) {
            if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1") {
                $file->url       = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl(''));
                $file->thumbnail = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl('thumb_favicon'));
            } else {
                $file->url = str_replace('localhost', 'localhost:8000', $file->getUrl());
                $file->thumbnail = str_replace('localhost', 'localhost:8000', $file->getUrl('thumb_favicon'));
            }
        }

        return $file;
    }

    public function getAboutPhotoAttribute()
    {
        $file = $this->getMedia('about_photo')->last();

        if ($file) {
            if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1") {
                $file->url       = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl(''));
                $file->thumbnail = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl('thumb_about_photo'));
            } else {
                $file->url = str_replace('localhost', 'localhost:8000', $file->getUrl());
                $file->thumbnail = str_replace('localhost', 'localhost:8000', $file->getUrl('thumb_about_photo'));
            }
        }

        return $file;
    }

    public function getGetQuotePhotoAttribute()
    {
        $file = $this->getMedia('get_quote_photo')->last();

        if ($file) {
            if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1") {
                $file->url       = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl(''));
                $file->thumbnail = str_replace('http://localhost/storage', asset('/system/storage/app/public') , $file->getUrl('thumb_get_quote'));
            } else {
                $file->url = str_replace('localhost', 'localhost:8000', $file->getUrl());
                $file->thumbnail = str_replace('localhost', 'localhost:8000', $file->getUrl('thumb_get_quote'));
            }
        }

        return $file;
    }

    public function getAboutVideoAttribute()
    {
        $file = $this->getMedia('about_video')->last();

        if ($file) {
            if ($_SERVER['REMOTE_ADDR'] != "127.0.0.1")
            {
                $file->url = str_replace('localhost/storage', $_SERVER['SERVER_NAME'].'/system/storage/app/public' , $file->getUrl(''));
            }
            else
            {
                $file->url = str_replace('localhost', 'localhost:8000', $file->getUrl(''));
            }
        }

        return $file;
    }

    public function getKeywordsAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('keywords_en');
        }
        else
        {
            $value = $this->getAttribute('keywords_ar');
        }

        return $value;
    }

    public function getImportantPopUpTitleAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('important_pop_up_title_en');
        }
        else
        {
            $value = $this->getAttribute('important_pop_up_title_ar');
        }

        return $value;
    }

    public function getImportantPopUpDescriptionAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('important_pop_up_description_en');
        }
        else
        {
            $value = $this->getAttribute('important_pop_up_description_ar');
        }

        return $value;
    }

    public function getSupportTitleAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('support_title_en');
        }
        else
        {
            $value = $this->getAttribute('support_title_ar');
        }

        return $value;
    }

    public function getSupportBriefAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('support_brief_en');
        }
        else
        {
            $value = $this->getAttribute('support_brief_ar');
        }

        return $value;
    }

    public function getSupportDescriptionAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('support_description_en');
        }
        else
        {
            $value = $this->getAttribute('support_description_ar');
        }

        return $value;
    }

    public function getTitleAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('title_en');
        }
        else
        {
            $value = $this->getAttribute('title_ar');
        }

        return $value;
    }

    public function getDescriptionAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('description_en');
        }
        else
        {
            $value = $this->getAttribute('description_ar');
        }

        return $value;
    }

    public function getVisionAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('vision_en');
        }
        else
        {
            $value = $this->getAttribute('vision_ar');
        }

        return $value;
    }

    public function getGetQuoteIntroductionAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('get_quote_introduction_en');
        }
        else
        {
            $value = $this->getAttribute('get_quote_introduction_ar');
        }

        return $value;
    }

    public function getGetQuoteSubTitleAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('get_quote_sub_title_en');
        }
        else
        {
            $value = $this->getAttribute('get_quote_sub_title_ar');
        }

        return $value;
    }

    public function getGetQuoteParagraphAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('get_quote_paragraph_en');
        }
        else
        {
            $value = $this->getAttribute('get_quote_paragraph_ar');
        }

        return $value;
    }

    public function getArticleAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('article_en');
        }
        else
        {
            $value = $this->getAttribute('article_ar');
        }

        return $value;
    }

    public function getAboutTitleAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('about_title_en');
        }
        else
        {
            $value = $this->getAttribute('about_title_ar');
        }

        return $value;
    }

    public function getTestimonialAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('testimonial_en');
        }
        else
        {
            $value = $this->getAttribute('testimonial_ar');
        }

        return $value;
    }

    public function getPortfolioAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('portfolio_en');
        }
        else
        {
            $value = $this->getAttribute('portfolio_ar');
        }

        return $value;
    }

    public function getAboutDescriptionAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('about_description_en');
        }
        else
        {
            $value = $this->getAttribute('about_description_ar');
        }

        return $value;
    }

    public function getAboutFullDescriptionAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('about_full_description_en');
        }
        else
        {
            $value = $this->getAttribute('about_full_description_ar');
        }

        return $value;
    }

    public function getServiceAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('service_en');
        }
        else
        {
            $value = $this->getAttribute('service_ar');
        }

        return $value;
    }

    public function getPortfolioSubTitleAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('portfolio_en');
        }
        else
        {
            $value = $this->getAttribute('portfolio_ar');
        }

        return $value;
    }

    public function getGalleryAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('gallery_en');
        }
        else
        {
            $value = $this->getAttribute('gallery_ar');
        }

        return $value;
    }

    public function getFeatureAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('feature_en');
        }
        else
        {
            $value = $this->getAttribute('feature_ar');
        }

        return $value;
    }

    public function getFaqAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('faq_en');
        }
        else
        {
            $value = $this->getAttribute('faq_ar');
        }

        return $value;
    }

    public function getCallActionAttribute()
    {
        if (app()->getLocale() == "en")
        {
            $value = $this->getAttribute('call_action_en');
        }
        else
        {
            $value = $this->getAttribute('call_action_ar');
        }

        return $value;
    }
}
