<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class BlogCategoriesDataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'categories');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'categories',
                'display_name_singular' => 'Category',
                'display_name_plural'   => 'Categories',
                'icon'                  => 'voyager-categories',
                'model_name'            => 'Pvtl\\VoyagerBlog\\Category',
                'controller'            => '\\TCG\\Voyager\\Http\\Controllers\\VoyagerBaseController',
                'controller'            => null,
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        if ($dataType->exists) {
            $dataType->update([
                'model_name' => 'Pvtl\\VoyagerBlog\\Category',
                'controller' => '\\TCG\\Voyager\\Http\\Controllers\\VoyagerBaseController',
            ]);
        }
    }

    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
