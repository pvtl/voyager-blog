<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class BlogMenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $this->createMainMenu();
        $this->updateAdminMenu();
    }

    protected function createMainMenu()
    {
        $menu = Menu::firstOrNew([
            'name' => 'primary',
        ]);

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => 'Blog',
            'url' => '/blog',
            'route' => null,
        ]);

        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => null,
                'color' => '#000000',
                'parent_id' => null,
                'order' => 3,
            ])->save();
        }
    }

    protected function updateAdminMenu()
    {
        // Ensure the admin menu exists
        Menu::firstOrCreate([
            'name' => 'admin',
        ]);

        $menu = Menu::where('name', 'admin')->firstOrFail();

        // Add a top level 'blog' menu item
        $parentItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => 'Blog',
            'url' => '',
            'route' => null,
        ]);

        if (!$parentItem->exists) {
            $parentItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-news',
                'color' => null,
                'parent_id' => null,
                'order' => 5,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => 'Posts',
            'url' => '',
            'route' => 'voyager.blog_posts.index',
        ]);

        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-news',
                'color' => null,
                'parent_id' => $parentItem->id,
                'order' => 1,
            ])->save();
        }

        // Nest Posts and Categories under Blog
        $categoryItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => 'Categories',
            'url' => '',
            'route' => 'voyager.categories.index'
        ]);

        if (!$categoryItem->exists) {
            $categoryItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-categories',
                'color' => null,
                'parent_id' => $parentItem->id,
                'order' => 2,
            ])->save();
        }
    }
}
