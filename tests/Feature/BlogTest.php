<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_index_displays_posts(): void
    {
        $post = Post::create([
            'title' => 'Article de test',
            'slug' => 'article-de-test',
            'content' => 'Contenu de test',
        ]);

        $this->get(route('blog.index'))
            ->assertOk()
            ->assertSee('Article de test')
            ->assertSee(route('blog.show', ['slug' => $post->slug, 'id' => $post->id]));
    }

    public function test_blog_show_displays_the_post(): void
    {
        $post = Post::create([
            'title' => 'Article de détail',
            'slug' => 'article-de-detail',
            'content' => 'Texte de l’article',
        ]);

        $this->get(route('blog.show', ['slug' => $post->slug, 'id' => $post->id]))
            ->assertOk()
            ->assertSee('Article de détail')
            ->assertSee('Texte de l’article');
    }

    public function test_blog_show_redirects_to_the_canonical_slug(): void
    {
        $post = Post::create([
            'title' => 'Article canonique',
            'slug' => 'article-canonique',
            'content' => 'Contenu',
        ]);

        $this->get(route('blog.show', ['slug' => 'ancien-slug', 'id' => $post->id]))
            ->assertRedirect(route('blog.show', ['slug' => $post->slug, 'id' => $post->id]));
    }
}