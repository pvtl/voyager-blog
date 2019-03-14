<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\DataRow;

class BlogDataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'blog_posts');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'blog_posts',
                'display_name_singular' => 'Blog Post',
                'display_name_plural'   => 'Blog Posts',
                'icon'                  => 'voyager-news',
                'model_name'            => 'Pvtl\\VoyagerBlog\\BlogPost',
                'controller'            => '\\Pvtl\\VoyagerBlog\\Http\\Controllers\\PostController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        if ($dataType->exists) {
            $dataType->update([
                'model_name' => 'Pvtl\\VoyagerBlog\\BlogPost',
                'controller' => '\\Pvtl\\VoyagerBlog\\Http\\Controllers\\PostController',
            ]);
        }

        $dataRow = $this->dataRow($dataType, 'author_id');
        $dataRow->fill([
            'type'         => 'select_dropdown',
            'display_name' => __('voyager::seeders.data_rows.author'),
            'required'     => 0,
            'browse'       => 0,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 1,
            'details'      => [
                'default' => '',
                'null'    => '',
                'options' => [
                    '' => '-- None --',
                ],
                'relationship' => [
                    'key'   => 'id',
                    'label' => 'name',
                ],
            ],
            'order' => 2,
        ])->save();

        $dataRow = $this->dataRow($dataType, 'category_id');
        $dataRow->fill([
            'type'         => 'select_dropdown',
            'display_name' => __('voyager::seeders.data_rows.category'),
            'required'     => 0,
            'browse'       => 0,
            'read'         => 1,
            'edit'         => 1,
            'add'          => 1,
            'delete'       => 1,
            'details'      => [
                'default' => '',
                'null'    => '',
                'options' => [
                    '' => '-- None --',
                ],
                'relationship' => [
                    'key'   => 'id',
                    'label' => 'name',
                ],
            ],
            'order' => 2,
        ])->save();
    }

    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
    
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field' => $field,
        ]);
    }
}
