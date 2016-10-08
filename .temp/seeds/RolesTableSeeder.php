<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'superadmin',
                'name' => 'SuperAdmin',
                'permissions' => NULL,
                'created_at' => '2016-09-27 12:05:26',
                'updated_at' => '2016-09-27 12:05:26',
            ),
            1 => 
            array (
                'id' => 2,
                'slug' => 'store-manager',
                'name' => 'Store Manager',
                'permissions' => '{"admin.dashboard":true,"admin.settings":false,"admin.settings.save":false,"admin.log":false,"admin.form-post.index":true,"admin.photo_gallery.index":true,"admin.photo_gallery.view":true,"admin.photo_gallery.create":true,"admin.photo_gallery.store":true,"admin.photo_gallery.edit":true,"admin.photo_gallery.update":true,"admin.photo_gallery.destroy":false,"admin.slider.index":false,"admin.slider.view":false,"admin.slider.create":false,"admin.slider.store":false,"admin.slider.edit":false,"admin.slider.update":false,"admin.slider.destroy":false,"admin.article.index":true,"admin.article.view":true,"admin.article.create":true,"admin.article.store":true,"admin.article.edit":true,"admin.article.update":true,"admin.article.destroy":false,"admin.news.index":false,"admin.news.view":false,"admin.news.create":false,"admin.news.store":false,"admin.news.edit":false,"admin.news.update":false,"admin.news.destroy":false,"admin.project.index":false,"admin.project.view":false,"admin.project.create":false,"admin.project.store":false,"admin.project.edit":false,"admin.project.update":false,"admin.project.destroy":false,"admin.category.index":true,"admin.category.view":true,"admin.category.create":false,"admin.category.store":false,"admin.category.edit":false,"admin.category.update":false,"admin.category.destroy":false,"admin.faq.index":true,"admin.faq.view":true,"admin.faq.create":true,"admin.faq.store":true,"admin.faq.edit":true,"admin.faq.update":true,"admin.faq.destroy":false,"admin.page.index":true,"admin.page.view":true,"admin.page.create":true,"admin.page.store":true,"admin.page.edit":true,"admin.page.update":true,"admin.page.destroy":false,"admin.video.index":true,"admin.video.view":true,"admin.video.create":true,"admin.video.store":true,"admin.video.edit":true,"admin.video.update":true,"admin.video.destroy":false,"admin.menu.index":false,"admin.menu.view":false,"admin.menu.create":false,"admin.menu.store":false,"admin.menu.edit":false,"admin.menu.update":false,"admin.menu.destroy":false,"admin.setting.index":false,"admin.setting.view":false,"admin.setting.create":false,"admin.setting.store":false,"admin.setting.edit":false,"admin.setting.update":false,"admin.setting.destroy":false,"admin.user.index":true,"admin.user.view":true,"admin.user.create":false,"admin.user.store":false,"admin.user.edit":true,"admin.user.update":true,"admin.user.destroy":false,"admin.group.index":true,"admin.group.view":true,"admin.group.create":false,"admin.group.store":false,"admin.group.edit":false,"admin.group.update":false,"admin.group.destroy":false,"admin.product.index":true,"admin.product.view":true,"admin.product.create":true,"admin.product.store":true,"admin.product.edit":true,"admin.product.update":true,"admin.product.destroy":false,"admin.order.index":true,"admin.order.view":true,"admin.order.create":false,"admin.order.store":false,"admin.order.edit":false,"admin.order.update":false,"admin.order.destroy":false}',
                'created_at' => '2016-10-04 10:48:28',
                'updated_at' => '2016-10-04 10:48:28',
            ),
            2 => 
            array (
                'id' => 3,
                'slug' => 'admin',
                'name' => 'Admin',
                'permissions' => '{"admin.dashboard":true,"admin.settings":true,"admin.settings.save":true,"admin.log":true,"admin.form-post.index":true,"admin.photo_gallery.index":true,"admin.photo_gallery.view":true,"admin.photo_gallery.create":true,"admin.photo_gallery.store":true,"admin.photo_gallery.edit":true,"admin.photo_gallery.update":true,"admin.photo_gallery.destroy":false,"admin.slider.index":false,"admin.slider.view":false,"admin.slider.create":false,"admin.slider.store":false,"admin.slider.edit":false,"admin.slider.update":false,"admin.slider.destroy":false,"admin.article.index":true,"admin.article.view":true,"admin.article.create":true,"admin.article.store":true,"admin.article.edit":true,"admin.article.update":true,"admin.article.destroy":false,"admin.news.index":false,"admin.news.view":false,"admin.news.create":false,"admin.news.store":false,"admin.news.edit":false,"admin.news.update":false,"admin.news.destroy":false,"admin.project.index":false,"admin.project.view":false,"admin.project.create":false,"admin.project.store":false,"admin.project.edit":false,"admin.project.update":false,"admin.project.destroy":false,"admin.category.index":true,"admin.category.view":true,"admin.category.create":true,"admin.category.store":true,"admin.category.edit":true,"admin.category.update":true,"admin.category.destroy":false,"admin.faq.index":true,"admin.faq.view":true,"admin.faq.create":true,"admin.faq.store":true,"admin.faq.edit":true,"admin.faq.update":true,"admin.faq.destroy":false,"admin.page.index":true,"admin.page.view":true,"admin.page.create":true,"admin.page.store":true,"admin.page.edit":true,"admin.page.update":true,"admin.page.destroy":false,"admin.video.index":true,"admin.video.view":true,"admin.video.create":true,"admin.video.store":true,"admin.video.edit":true,"admin.video.update":true,"admin.video.destroy":false,"admin.menu.index":true,"admin.menu.view":true,"admin.menu.create":false,"admin.menu.store":false,"admin.menu.edit":false,"admin.menu.update":false,"admin.menu.destroy":false,"admin.setting.index":true,"admin.setting.view":true,"admin.setting.create":true,"admin.setting.store":true,"admin.setting.edit":true,"admin.setting.update":true,"admin.setting.destroy":false,"admin.user.index":true,"admin.user.view":true,"admin.user.create":true,"admin.user.store":true,"admin.user.edit":true,"admin.user.update":true,"admin.user.destroy":false,"admin.group.index":true,"admin.group.view":true,"admin.group.create":true,"admin.group.store":true,"admin.group.edit":true,"admin.group.update":true,"admin.group.destroy":false,"admin.product.index":true,"admin.product.view":true,"admin.product.create":true,"admin.product.store":true,"admin.product.edit":true,"admin.product.update":true,"admin.product.destroy":false,"admin.order.index":true,"admin.order.view":true,"admin.order.create":true,"admin.order.store":true,"admin.order.edit":true,"admin.order.update":true,"admin.order.destroy":false}',
                'created_at' => '2016-10-04 10:56:37',
                'updated_at' => '2016-10-04 10:56:37',
            ),
            3 => 
            array (
                'id' => 4,
                'slug' => 'blog-manager',
                'name' => 'Blog Manager',
                'permissions' => '{"admin.dashboard":true,"admin.settings":false,"admin.settings.save":false,"admin.log":false,"admin.form-post.index":true,"admin.photo_gallery.index":true,"admin.photo_gallery.view":true,"admin.photo_gallery.create":true,"admin.photo_gallery.store":true,"admin.photo_gallery.edit":true,"admin.photo_gallery.update":true,"admin.photo_gallery.destroy":false,"admin.slider.index":false,"admin.slider.view":false,"admin.slider.create":false,"admin.slider.store":false,"admin.slider.edit":false,"admin.slider.update":false,"admin.slider.destroy":false,"admin.article.index":true,"admin.article.view":true,"admin.article.create":true,"admin.article.store":true,"admin.article.edit":true,"admin.article.update":true,"admin.article.destroy":false,"admin.news.index":false,"admin.news.view":false,"admin.news.create":false,"admin.news.store":false,"admin.news.edit":false,"admin.news.update":false,"admin.news.destroy":false,"admin.project.index":false,"admin.project.view":false,"admin.project.create":false,"admin.project.store":false,"admin.project.edit":false,"admin.project.update":false,"admin.project.destroy":false,"admin.category.index":true,"admin.category.view":true,"admin.category.create":false,"admin.category.store":false,"admin.category.edit":false,"admin.category.update":false,"admin.category.destroy":false,"admin.faq.index":true,"admin.faq.view":true,"admin.faq.create":false,"admin.faq.store":false,"admin.faq.edit":false,"admin.faq.update":false,"admin.faq.destroy":false,"admin.page.index":true,"admin.page.view":true,"admin.page.create":false,"admin.page.store":false,"admin.page.edit":false,"admin.page.update":false,"admin.page.destroy":false,"admin.video.index":true,"admin.video.view":true,"admin.video.create":true,"admin.video.store":true,"admin.video.edit":true,"admin.video.update":true,"admin.video.destroy":false,"admin.menu.index":true,"admin.menu.view":true,"admin.menu.create":false,"admin.menu.store":false,"admin.menu.edit":false,"admin.menu.update":false,"admin.menu.destroy":false,"admin.setting.index":false,"admin.setting.view":false,"admin.setting.create":false,"admin.setting.store":false,"admin.setting.edit":false,"admin.setting.update":false,"admin.setting.destroy":false,"admin.user.index":false,"admin.user.view":false,"admin.user.create":false,"admin.user.store":false,"admin.user.edit":false,"admin.user.update":false,"admin.user.destroy":false,"admin.group.index":false,"admin.group.view":false,"admin.group.create":false,"admin.group.store":false,"admin.group.edit":false,"admin.group.update":false,"admin.group.destroy":false,"admin.product.index":false,"admin.product.view":false,"admin.product.create":false,"admin.product.store":false,"admin.product.edit":false,"admin.product.update":false,"admin.product.destroy":false,"admin.order.index":false,"admin.order.view":false,"admin.order.create":false,"admin.order.store":false,"admin.order.edit":false,"admin.order.update":false,"admin.order.destroy":false}',
                'created_at' => '2016-10-04 10:58:31',
                'updated_at' => '2016-10-04 10:58:31',
            ),
        ));
        
        
    }
}
