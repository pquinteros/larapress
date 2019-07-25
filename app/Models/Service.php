<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Service extends Model
{
    use CrudTrait;
    use Sluggable, SluggableScopeHelpers;
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'services';
     protected $primaryKey = 'id';
     public $timestamps = true;
     //protected $guarded = ['id'];
     protected $fillable = ['slug', 'title', 'resumen', 'content', 'image','imagesquare', 'status', 'date'];
    // protected $hidden = [];
    // protected $dates = [];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_title',
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function getPageLink()
    {
        return url('service/'.$this->slug);
    }

    public function getOpenButton()
    {
        return '<a class="btn btn-default btn-xs" href="'.$this->getPageLink().'" target="_blank">'.
            '<i class="fa fa-eye"></i> '.trans('backpack::pagemanager.open').'</a>';
    }


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopePublished($query)
    {
        return $query->where('status', 'PUBLISHED')
                    ->where('date', '<=', date('Y-m-d'))
                    ->orderBy('date', 'DESC');
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

      // The slug is created automatically from the "title" field if no slug exists.
      public function getSlugOrTitleAttribute()
      {
          if ($this->slug != '') {
              return $this->slug;
          }
  
          return $this->title;
      }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setImagesquareAttribute($value)
    {
        $attribute_name = "imagesquare";
        $disk = "uploads";
        $destination_path = "/service";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image')) {
            // 0. Make the image
            $image = \Image::make($value);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $filename;
        }
    }

    

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($obj) {
            \Storage::disk('uploads')->delete($obj->imagen);
        });
    }

}
