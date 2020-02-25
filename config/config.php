<?php

return [
	/**
	 * override laravel-comment model
	 */
	'model'      => \Takdeniz\LikableComment\Models\Comment::class,

	/**
	 * default comment like model
	 */
	'like_model' => \Takdeniz\LikableComment\Models\CommentLike::class,
];
