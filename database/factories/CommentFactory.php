<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $comment_count_upper = 0;

        $image = fake()->optional()->imageUrl($width = 640, $height = 480);

        $comment_count_upper++;
        //this will generate the id of the comment to reply to or null if its replying to a post
        $reply_comment_id = fake()/*->optional()*/->numberBetween(1,$comment_count_upper);

        /*if it is a top level comment then we need to generate a post id for it to comment on
        otherwise it will use the same post id as the comment it is replying to */
        if(is_null($reply_comment_id))
        {
            $post_id = fake()->numberBetween(1,Post::count());
        }
        else
        {
            //$parent_comment = Comment::where("id", $reply_comment_id);
            $parent_comment = Comment::select("post_id")->where("id", $reply_comment_id)->first()?->post_id;
            $post_id = $parent_comment;
            
            //$post_id = $parent_comment->value("post_id");
            
        }
        
        return [
        "image_location" => $image,
        "contains_image" => !is_null($image),
        "comment_text" => fake()->paragraph(fake()->numberBetween(1,2), true),
        "user_id" => fake()->numberBetween(1,User::count()),
        "post_id" => $post_id,
        "comment_id" => $reply_comment_id,
        ];
    }
}
