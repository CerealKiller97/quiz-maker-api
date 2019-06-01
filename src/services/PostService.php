<?php

namespace App\Services;

use \App\Contracts\PostContract;
use App\Models\Post;
use Illuminate\Database\Query\Builder;

class PostService implements PostContract
{
    protected $table;
    protected $post;

    public function __construct(Builder $table)
    {
        $this->table = $table;
        $this->post = new Post();
    }

    public function read(): object
    {
        return Post::all();
    }

    public function readById(int $id)
    {
        return Post::findOrFail($id);
    }

    public function create(array $dto)
    {
        $this->post->title = $dto['title'];
        $this->post->body = $dto['body'];
        $this->post->user_id = $dto['userId'];

        $this->post->save();

        return $this->post->id;
    }

    public function update(int $id, array $dto)
    {
        $post = Post::findOrFail($id);
        $post->title = $dto['title'];
        $post->body = $dto['body'];
        $post->user_id = $dto['userId'];

        $post->save();
    }

    public function delete(int $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    }

    public function queryUser(int $id)
    {
        $post = Post::findOrFail($id);
        return $post->user;
    }
}