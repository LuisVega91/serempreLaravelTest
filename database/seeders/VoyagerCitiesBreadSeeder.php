<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoyagerCitiesBreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // data type


        $data_types = array(
            array(
                "id" => 5,
                "name" => "cities",
                "slug" => "cities",
                "display_name_singular" => "City",
                "display_name_plural" => "Cities",
                "icon" => null,
                "model_name" => "App\\Models\\City",
                "policy_name" => null,
                "controller" => null,
                "description" => null,
                "generate_permissions" => 1,
                "server_side" => 0,
                "details" => "{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}",
                "created_at" => "2022-03-20 19:55:44",
                "updated_at" => "2022-03-20 19:55:44"
            )
        );

        DB::table('data_types')->insert($data_types);

        $data_rows = array(
            array(
                "id" => 22,
                "data_type_id" => 5,
                "field" => "id",
                "type" => "text",
                "display_name" => "Id",
                "required" => 1,
                "browse" => 0,
                "read" => 0,
                "edit" => 0,
                "add" => 0,
                "delete" => 0,
                "details" => "{}",
                "order" => 1
            ),
            array(
                "id" => 23,
                "data_type_id" => 5,
                "field" => "cod",
                "type" => "text",
                "display_name" => "Cod",
                "required" => 1,
                "browse" => 1,
                "read" => 1,
                "edit" => 1,
                "add" => 1,
                "delete" => 1,
                "details" => "{}",
                "order" => 2
            ),
            array(
                "id" => 24,
                "data_type_id" => 5,
                "field" => "name",
                "type" => "text",
                "display_name" => "Name",
                "required" => 1,
                "browse" => 1,
                "read" => 1,
                "edit" => 1,
                "add" => 1,
                "delete" => 1,
                "details" => "{}",
                "order" => 3
            ),
            array(
                "id" => 25,
                "data_type_id" => 5,
                "field" => "created_at",
                "type" => "timestamp",
                "display_name" => "Created At",
                "required" => 0,
                "browse" => 1,
                "read" => 1,
                "edit" => 1,
                "add" => 0,
                "delete" => 1,
                "details" => "{}",
                "order" => 4
            ),
            array(
                "id" => 26,
                "data_type_id" => 5,
                "field" => "updated_at",
                "type" => "timestamp",
                "display_name" => "Updated At",
                "required" => 0,
                "browse" => 0,
                "read" => 0,
                "edit" => 0,
                "add" => 0,
                "delete" => 0,
                "details" => "{}",
                "order" => 5
            )
        );

        DB::table('data_rows')->insert($data_rows);

        $menu_items = array(
            array(
                "id" => 11,
                "menu_id" => 1,
                "title" => "Cities",
                "url" => "",
                "target" => "_self",
                "icon_class" => null,
                "color" => null,
                "parent_id" => null,
                "order" => 15,
                "created_at" => "2022-03-20 19:55:44",
                "updated_at" => "2022-03-20 19:55:44",
                "route" => "voyager.cities.index",
                "parameters" => null
            )
        );

        DB::table('menu_items')->insert($menu_items);


        $permissions = array(
            array(
                "id" => 26,
                "key" => "browse_cities",
                "table_name" => "cities",
                "created_at" => "2022-03-20 19:55:44",
                "updated_at" => "2022-03-20 19:55:44"
            ),
            array(
                "id" => 27,
                "key" => "read_cities",
                "table_name" => "cities",
                "created_at" => "2022-03-20 19:55:44",
                "updated_at" => "2022-03-20 19:55:44"
            ),
            array(
                "id" => 28,
                "key" => "edit_cities",
                "table_name" => "cities",
                "created_at" => "2022-03-20 19:55:44",
                "updated_at" => "2022-03-20 19:55:44"
            ),
            array(
                "id" => 29,
                "key" => "add_cities",
                "table_name" => "cities",
                "created_at" => "2022-03-20 19:55:44",
                "updated_at" => "2022-03-20 19:55:44"
            ),
            array(
                "id" => 30,
                "key" => "delete_cities",
                "table_name" => "cities",
                "created_at" => "2022-03-20 19:55:44",
                "updated_at" => "2022-03-20 19:55:44"
            )
        );

        DB::table('permissions')->insert($permissions);


        $permission_role = array(
            array(
                "permission_id" => 26,
                "role_id" => 1
            ),
            array(
                "permission_id" => 27,
                "role_id" => 1
            ),
            array(
                "permission_id" => 28,
                "role_id" => 1
            ),
            array(
                "permission_id" => 29,
                "role_id" => 1
            ),
            array(
                "permission_id" => 30,
                "role_id" => 1
            )
        );

        DB::table('permission_role')->insert($permission_role);
    }
}
