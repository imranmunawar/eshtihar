<?php


class MediaResource extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'media_resources';
        
        protected $fillable = array('poster_id','upload');

      /**
	 * Related Parent Tabel User
	 *
	 */
        public function user()
        {
            return $this->belongsTo('User');
        }

}