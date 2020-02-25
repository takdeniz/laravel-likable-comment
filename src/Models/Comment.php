<?php
namespace Takdeniz\LikableComment\Models;

use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 *
 * Class PhoneVerify
 *
 * @package Wisdmlabs\Todolist
 * @author  Tuncay Akdeniz <akdeniztuncay44@gmail.com>
 * @version 0.1
 * @since   0.1
 * @property integer like
 * @property integer dislike
 */
class Comment extends \Actuallymab\LaravelComment\Models\Comment
{
	public function likes(): MorphMany
	{
		return $this->morphMany(config('comment.like_model'), 'likable');
	}
}
