<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoyagerClientsBreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data_types = array(
            array(
                "id" => 6,
                "name" => "clients",
                "slug" => "clients",
                "display_name_singular" => "Client",
                "display_name_plural" => "Clients",
                "icon" => null,
                "model_name" => "App\\Models\\Client",
                "policy_name" => null,
                "controller" => null,
                "description" => null,
                "generate_permissions" => 1,
                "server_side" => 0,
                "details" => "{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}",
                "created_at" => "2022-03-20 20:38:30",
                "updated_at" => "2022-03-20 20:45:25"
            )
        );


        DB::table('data_types')->insert($data_types);


        $data_rows = array(
            array(
                "id" => 27,
                "data_type_id" => 6,
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
                "id" => 28,
                "data_type_id" => 6,
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
                "order" => 3
            ),
            array(
                "id" => 29,
                "data_type_id" => 6,
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
                "order" => 4
            ),
            array(
                "id" => 30,
                "data_type_id" => 6,
                "field" => "city_id",
                "type" => "select_dropdown",
                "display_name" => "City Id",
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
                "id" => 31,
                "data_type_id" => 6,
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
                "order" => 5
            ),
            array(
                "id" => 32,
                "data_type_id" => 6,
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
                "order" => 6
            ),
            array(
                "id" => 33,
                "data_type_id" => 6,
                "field" => "client_hasone_city_relationship",
                "type" => "relationship",
                "display_name" => "cities",
                "required" => 0,
                "browse" => 1,
                "read" => 1,
                "edit" => 1,
                "add" => 1,
                "delete" => 1,
                "details" => "{\"model\":\"App\\\\Models\\\\City\",\"table\":\"cities\",\"type\":\"belongsTo\",\"column\":\"city_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"cities\",\"pivot\":\"0\",\"taggable\":\"0\"}",
                "order" => 7
            )
        );

        DB::table('data_rows')->insert($data_rows);


        $menu_items = array(
            array(
                "id" => 12,
                "menu_id" => 1,
                "title" => "Clients",
                "url" => "",
                "target" => "_self",
                "icon_class" => null,
                "color" => null,
                "parent_id" => null,
                "order" => 16,
                "created_at" => "2022-03-20 20:38:30",
                "updated_at" => "2022-03-20 20:38:30",
                "route" => "voyager.clients.index",
                "parameters" => null
            )
        );

        DB::table('menu_items')->insert($menu_items);


        $permissions = array(
            array(
                "id" => 31,
                "key" => "browse_clients",
                "table_name" => "clients",
                "created_at" => "2022-03-20 20:38:30",
                "updated_at" => "2022-03-20 20:38:30"
            ),
            array(
                "id" => 32,
                "key" => "read_clients",
                "table_name" => "clients",
                "created_at" => "2022-03-20 20:38:30",
                "updated_at" => "2022-03-20 20:38:30"
            ),
            array(
                "id" => 33,
                "key" => "edit_clients",
                "table_name" => "clients",
                "created_at" => "2022-03-20 20:38:30",
                "updated_at" => "2022-03-20 20:38:30"
            ),
            array(
                "id" => 34,
                "key" => "add_clients",
                "table_name" => "clients",
                "created_at" => "2022-03-20 20:38:30",
                "updated_at" => "2022-03-20 20:38:30"
            ),
            array(
                "id" => 35,
                "key" => "delete_clients",
                "table_name" => "clients",
                "created_at" => "2022-03-20 20:38:30",
                "updated_at" => "2022-03-20 20:38:30"
            )
        );

        DB::table('permissions')->insert($permissions);


        $permission_role = array(
            array(
                "permission_id" => 31,
                "role_id" => 1
            ),
            array(
                "permission_id" => 32,
                "role_id" => 1
            ),
            array(
                "permission_id" => 33,
                "role_id" => 1
            ),
            array(
                "permission_id" => 34,
                "role_id" => 1
            ),
            array(
                "permission_id" => 35,
                "role_id" => 1
            )
        );

        DB::table('permission_role')->insert($permission_role);

    }
}
