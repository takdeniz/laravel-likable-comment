<?php
namespace Takdeniz\LikableComment\Traits;

use Actuallymab\LaravelComment\Models\Comment;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Trait CanLikeComment
 *
 * @package Takdeniz\LikableComment\Traits
 * @author  Tuncay Akdeniz <akdeniztuncay44@gmail.com>
 * @version 0.1
 * @since   0.1
 */
trait CanLikeComment
{
	/**
	 * @param Comment $comment
	 * @param bool    $isLiked
	 * @return mixed
	 */
	public function likeOrDislike(Comment $comment, $isLiked = true)
	{
		$existReaction = $this->reactions()->where('comment_id', $comment->id)->first();
		if ($existReaction) {
			if ($existReaction->is_liked == $isLiked) {
				return null;
			}
			$existReaction->is_liked = $isLiked;

			$comment->increment($isLiked ? 'like' : 'dislike');
			$comment->decrement(!$isLiked ? 'like' : 'dislike');

			return $existReaction->save();
		}

		$likeModel = config('comment.like_model');

		$like = new $likeModel([
			'is_liked' => $isLiked,
			'user_id'  => $this->getKey(),
		]);

		$comment->likes()->save($like);

		$comment->increment($isLiked ? 'like' : 'dislike');

		return $like;
	}

	/**
	 * @param Comment $comment
	 * @return mixed
	 */
	public function like(Comment $comment)
	{
		return $this->likeOrDislike($comment, true);
	}

	/**
	 * @param Comment $comment
	 * @return mixed
	 */
	public function dislike(Comment $comment)
	{
		return $this->likeOrDislike($comment, false);
	}

	/**
	 * @return HasMany
	 */
	public function reactions()
	{
		return $this->hasMany(config('comment.like_model'));
	}

}
