<?php
namespace Takdeniz\LikableComment\Traits;

use Actuallymab\LaravelComment\Models\Comment;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait CanLikeComment
{
	public function likeOrDislike(Comment $comment, $isLiked = true)
	{
		$likeModel = config('comment.like_model');

		$like = new $likeModel([
			'is_liked'   => $isLiked,
			'liked_id'   => $this->getKey(),
			'liked_type' => get_class(),
		]);

		$comment->likes()->save($like);

		$comment->increment($isLiked ? 'like' : 'dislike');

		return $like;
	}

	public function like(Comment $comment)
	{
		return $this->likeOrDislike($comment, true);
	}

	public function dislike(Comment $comment)
	{
		return $this->likeOrDislike($comment, false);
	}

	public function likes(): MorphMany
	{
		return $this->morphMany(config('comment.like_model'), 'liked');
	}

}
