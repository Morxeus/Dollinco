<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Lista de permisos
        $permissions = [
            // Estado-Periodos
            'ver estado-periodos',
            'crear estado-periodos',
            'editar estado-periodos',
            'eliminar estado-periodos',
        
            // Periodos
            'ver periodos',
            'crear periodos',
            'editar periodos',
            'eliminar periodos',
        
            // Alumnos
            'ver alumnos',
            'crear alumnos',
            'editar alumnos',
            'eliminar alumnos',
        
            // Apoderados
            'ver apoderados',
            'crear apoderados',
            'editar apoderados',
            'eliminar apoderados',
        
            // Cursos
            'ver cursos',
            'crear cursos',
            'editar cursos',
            'eliminar cursos',
        
            // Estado-Matriculas
            'ver estado-matriculas',
            'crear estado-matriculas',
            'editar estado-matriculas',
            'eliminar estado-matriculas',
        
            // Asignaturas
            'ver asignaturas',
            'crear asignaturas',
            'editar asignaturas',
            'eliminar asignaturas',
        
            // Curso-Ofrecidos
            'ver curso-ofrecidos',
            'crear curso-ofrecidos',
            'editar curso-ofrecidos',
            'eliminar curso-ofrecidos',
        
            // Evaluaciones
            'ver evaluacions',
            'crear evaluacions',
            'editar evaluacions',
            'eliminar evaluacions',
        
            // Asistencias
            'ver asistencias',
            'crear asistencias',
            'editar asistencias',
            'eliminar asistencias',
        
            // Profesor-Directors
            'ver profesor-directors',
            'crear profesor-directors',
            'editar profesor-directors',
            'eliminar profesor-directors',
        
            // Reunions
            'ver reunions',
            'crear reunions',
            'editar reunions',
            'eliminar reunions',
        
            // Anotaciones
            'ver anotacions',
            'crear anotacions',
            'editar anotacions',
            'eliminar anotacions',
        
            // Matriculas
            'ver matriculas',
            'crear matriculas',
            'editar matriculas',
            'eliminar matriculas',
        
            // Reunion-Apoderados
            'ver reunion-apoderados',
            'crear reunion-apoderados',
            'editar reunion-apoderados',
            'eliminar reunion-apoderados',
        
            // Registros de Clases
            'ver registrosde-clases',
            'crear registrosde-clases',
            'editar registrosde-clases',
            'eliminar registrosde-clases',
        
            // Profesor-Clases
            'ver profesor-clases',
            'crear profesor-clases',
            'editar profesor-clases',
            'eliminar profesor-clases',
        
            // Mallas
            'ver mallas',
            'crear mallas',
            'editar mallas',
            'eliminar mallas',
        ];

        // Crear permisos
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Crear roles
        $adminRole = Role::firstOrCreate(['name' => 'administrador']);
        $profesorRole = Role::firstOrCreate(['name' => 'profesor']);
        $apoderadoRole = Role::firstOrCreate(['name' => 'apoderado']);

        // El administrador tiene todos los permisos
        $adminRole->givePermissionTo(Permission::all());

        // El profesor tiene permisos compartidos con el administrador
        $profesorRole->givePermissionTo([
            'ver alumnos',
            'crear alumnos',
            'editar alumnos',
            'ver apoderados',
            'crear apoderados',
            'editar apoderados',
            'ver matriculas',
            'crear matriculas',
            'editar matriculas',
            'ver reunion-apoderados',
            'crear reunion-apoderados',
            'editar reunion-apoderados',
            'ver reunions',
            'crear reunions',
            'editar reunions',
            'ver profesor-clases',
            'crear profesor-clases',
            'editar profesor-clases',
            'ver mallas',
            'crear mallas',
            'editar mallas',
            'ver registrosde-clases',
            'crear registrosde-clases',
            'editar registrosde-clases',
            'ver anotacions',
            'crear anotacions',
            'editar anotacions',
            'ver evaluacions',
            'crear evaluacions',
            'editar evaluacions',
        ]);
        

        $apoderadoRole->givePermissionTo([
            'ver alumnos',
            'ver apoderados',
            'ver matriculas',
            'ver reunions',
            'ver cursos',
            'ver mallas',
            'ver asignaturas',
            'ver registrosde-clases',
            'ver anotacions',
            'ver evaluacions',
            'ver asistencias',
        ]);

        $this->command->info('Roles y permisos asignados correctamente.');
    }
}
