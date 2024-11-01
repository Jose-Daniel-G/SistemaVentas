<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{

    public function run()
    {

        // ----------------------------------------------------------------------------------------------
        // Crear roles y asignar permisos
        $superAdmin = Role::create(['name' => 'superAdmin']);
        $admin = Role::create(['name' => 'admin']);
        $secretaria = Role::create(['name' => 'secretaria']);
        $profesor = Role::create(['name' => 'profesor']);
        $cliente = Role::create(['name' => 'cliente']);
        // $user = Role::create(['name' => 'usuario']);

        //------------------------[ ALEJANDRO PROJECT  ]---------------------------------
        // Permission::create(['name'=>'admin.home'])->assignRole($admin);
        Permission::create(['name' => 'admin.home'])->syncRoles([$superAdmin, $admin, $secretaria, $profesor, $cliente]);
        Permission::create(['name' => 'admin.index']);

        // //rutas para el admin


        //rutas - configuraciones
        // Permission::create(['name' => 'admin.config.index'])->syncRoles([$superAdmin]);
        // Permission::create(['name' => 'admin.config.create'])->syncRoles([$superAdmin]);
        // Permission::create(['name' => 'admin.config.store'])->syncRoles([$superAdmin]);
        // Permission::create(['name' => 'admin.config.show'])->syncRoles([$superAdmin]);
        // Permission::create(['name' => 'admin.config.edit'])->syncRoles([$superAdmin]);
        // Permission::create(['name' => 'admin.config.destroy'])->syncRoles([$superAdmin]);

        //rutas para el admin - secretarias
        // Permission::create(['name' => 'admin.secretarias.index'])->syncRoles([$superAdmin, $admin]);
        // Permission::create(['name' => 'admin.secretarias.create'])->syncRoles([$superAdmin, $admin]);
        // Permission::create(['name' => 'admin.secretarias.store'])->syncRoles([$superAdmin, $admin]);
        // Permission::create(['name' => 'admin.secretarias.show'])->syncRoles([$superAdmin, $admin]);
        // Permission::create(['name' => 'admin.secretarias.edit'])->syncRoles([$superAdmin, $admin]);
        // Permission::create(['name' => 'admin.secretarias.destroy'])->syncRoles([$superAdmin, $admin]);

        //rutas para el admin - clientes
        // Permission::create(['name' => 'admin.clientes.index'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.clientes.create'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.clientes.store'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.clientes.show'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.clientes.edit'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.clientes.destroy'])->syncRoles([$superAdmin, $admin, $secretaria]);
        //rutas para el admin - cursos
        // Permission::create(['name' => 'admin.cursos.index'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.cursos.create'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.cursos.store'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.cursos.show'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.cursos.edit'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.cursos.destroy'])->syncRoles([$superAdmin, $admin, $secretaria]);
        //rutas para el admin - profesores
        // Permission::create(['name' => 'admin.profesores.index'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.profesores.create'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.profesores.store'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.profesores.show'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.profesores.edit'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.profesores.destroy'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.profesores.pdf'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.profesores.reportes'])->syncRoles([$superAdmin, $admin, $secretaria]);

        //rutas para el admin - horarios
        // Permission::create(['name' => 'admin.horarios.index'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.horarios.create'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.horarios.store'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.horarios.show'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.horarios.edit'])->syncRoles([$superAdmin, $admin, $secretaria]);

        // //rutas para el admin VEHICULOS
        // Permission::create(['name' => 'admin.vehiculos.index'])->syncRoles([$superAdmin]);
        // Permission::create(['name' => 'admin.vehiculos.create'])->syncRoles([$superAdmin]);
        // Permission::create(['name' => 'admin.vehiculos.update'])->syncRoles([$superAdmin]);

        //rutas para el admin PICO Y PLACA
        // Permission::create(['name' => 'admin.vehiculos.pico_y_placa.index'])->syncRoles([$superAdmin]);
        // Permission::create(['name' => 'admin.vehiculos.pico_y_placa.create'])->syncRoles([$superAdmin]);
        // Permission::create(['name' => 'admin.vehiculos.pico_y_placa.update'])->syncRoles([$superAdmin]);

        //----------------------------------------------------------------------------------------
        // Permission::create(['name' => 'show_datos_cursos'])->syncRoles([$superAdmin, $admin, $secretaria, $cliente]);
        // Permission::create(['name' => 'admin.horarios.show_reserva_profesores'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.show_reservas'])->syncRoles([$superAdmin, $admin, $secretaria, $cliente]);
        // Permission::create(['name' => 'admin.events'])->syncRoles([$superAdmin, $admin, $secretaria]);
        // Permission::create(['name' => 'admin.listUsers'])->syncRoles([$superAdmin, $admin, $secretaria]); //modal agendamiento de clase admin
        // Permission::create(['name' => 'admin.reservas.edit'])->syncRoles([$superAdmin, $admin, $secretaria]);
        //rutas para el admin - asistencias
        // Permission::create(['name' => 'admin.asistencias.registrar_asistencia'])->syncRoles([$superAdmin, $admin, $secretaria, $profesor]);
        // Permission::create(['name' => 'admin.asistencias.list_inacistencias'])->syncRoles([$superAdmin, $admin, $secretaria]);
        Permission::create(['name' => 'admin.event_delete'])->syncRoles([$superAdmin, $admin, $secretaria]);
        /*OLD*/ //Permission::create(['name' => 'admin.asistenciass.registrar_asistencia'])->syncRoles([$superAdmin, $admin, $secretaria, $profesor]);
        /*OLD*/ //Permission::create(['name' => 'admin.asistenciass.list_inacistencias'])->syncRoles([$superAdmin, $admin, $secretaria, $profesor]);
        // $superAdmin->givePermissionTo(Permission::all());

        //----------------------------------------------------------------------------------------

        // Permission::create(['name' => 'admin.users.index'])->syncRoles([$superAdmin, $admin]);
        // //proximamente remplazadas estas rutas seran
        // Permission::create(['name' => 'admin.users.index'])->syncRoles([$superAdmin, $admin]);
        // Permission::create(['name' => 'admin.users.create'])->syncRoles([$superAdmin, $admin]);
        // Permission::create(['name' => 'admin.users.store'])->syncRoles([$superAdmin, $admin]);
        // Permission::create(['name' => 'admin.users.show'])->syncRoles([$superAdmin, $admin]);
        // Permission::create(['name' => 'admin.users.edit'])->syncRoles([$superAdmin, $admin]);
        // Permission::create(['name' => 'admin.users.update'])->syncRoles([$superAdmin, $admin]);
        // Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$superAdmin, $admin]);

        // $admin->permissions()->attach();



        // //CURSOS
        // Permission::create(['name'=>'admin.cursos.index'])->syncRoles([$superAdmin, $admin,$role3,$role4]);
        // Permission::create(['name'=>'admin.cursos.create'])->syncRoles([$superAdmin, $admin]);
        // Permission::create(['name'=>'admin.cursos.update'])->syncRoles([$superAdmin, $admin]);

        // //CLASES
        // Permission::create(['name'=>'admin.clases.index'])->syncRoles([$superAdmin, $admin,$role3,$role4]);
        // Permission::create(['name'=>'admin.clases.create'])->syncRoles([$superAdmin, $admin,$role3]);
        // Permission::create(['name'=>'admin.clases.update'])->syncRoles([$superAdmin, $admin,$role3]);


    }
}
