<?php
namespace Takdeniz\LikableComment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class CommentLike extends Model
{
	protected $guarded = [];

	public function liked(): MorphTo
	{
		return $this->morphTo();
	}

	public function likable(): MorphTo
	{
		return $this->morphTo();
	}

}
