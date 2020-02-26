<?php
namespace Takdeniz\LikableComment\Models;

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
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function likes()
	{
		return $this->hasMany(config('comment.like_model'));
	}
}
