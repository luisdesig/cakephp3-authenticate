<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{

    public $autoId = false;

    public function up()
    {
        $table = $this->table('personas');
        $table
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('nombres', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('apepaterno', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('apematerno', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => false,
            ])
            ->addColumn('fecnacimiento', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('tbltipdocumento', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('numerodocumento', 'string', [
                'default' => null,
                'limit' => 20,
                'null' => true,
            ])
            ->addColumn('tblgenero', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $table = $this->table('rolusers');
        $table
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('tabla_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('activo', 'string', [
                'default' => 'S',
                'limit' => 1,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $table = $this->table('tablas');
        $table
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('parent_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('tipo', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('valor', 'biginteger', [
                'default' => null,
                //'limit' => 20,
                'null' => true,
            ])
            ->addColumn('codigo', 'string', [
                'default' => null,
                'limit' => 100,
                'null' => true,
            ])
            ->addColumn('fecha', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('nombre', 'string', [
                'default' => null,
                'limit' => 250,
                'null' => true,
            ])
            ->addColumn('descripcion', 'string', [
                'default' => null,
                'limit' => 250,
                'null' => true,
            ])
            ->addColumn('lft', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('rght', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $table = $this->table('users');
        $table
            ->addColumn('id', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 10,
                'null' => false,
                'signed' => false,
            ])
            ->addPrimaryKey(['id'])
            ->addColumn('persona_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 80,
                'null' => false,
            ])
            ->addColumn('username', 'string', [
                'default' => null,
                'limit' => 50,
                'null' => true,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('passtoken', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('passtokenfecha', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('fotodir', 'string', [
                'default' => null,
                'limit' => 250,
                'null' => true,
            ])
            ->addColumn('foto', 'string', [
                'default' => null,
                'limit' => 250,
                'null' => true,
            ])
            ->addColumn('activo', 'string', [
                'default' => 'S',
                'limit' => 1,
                'null' => false,
            ])
            ->addColumn('eliminado', 'string', [
                'default' => 'N',
                'limit' => 1,
                'null' => true,
            ])
            ->addColumn('status', 'integer', [
                'default' => 1,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();
            
    $this->execute('INSERT INTO `personas` (`id`, `nombres`, `apepaterno`, `apematerno`, `fecnacimiento`, `tbltipdocumento`, `numerodocumento`, `tblgenero`, `created`, `modified`) VALUES(1, "administrador", "del", "sistema", "0000-00-00 00:00:00", 1, "23456723", 1, "2016-03-22 07:02:41", NULL)');
    $this->execute('INSERT INTO `users` (`id`, `persona_id`, `email`, `username`, `password`, `passtoken`, `passtokenfecha`, `fotodir`, `foto`, `activo`, `eliminado`, `status`, `created`, `modified`) VALUES(1, 1, "admin@admin.com", "admin", "$2y$10$.5BwWje6vLYfjsrELeNPzO2IGOXY.gFVEYax8n038kAhBhC0tGoYi", NULL, NULL, "b8d7708b-22dd-482a-8694-0481545c57b3", "20151129_154444.jpg", "S", "N", 1, "2015-09-15 19:40:05", "2016-03-22 07:42:55")');
    $this->execute('INSERT INTO `tablas` (`id`, `parent_id`, `tipo`, `valor`, `codigo`, `fecha`, `nombre`, `descripcion`, `lft`, `rght`, `created`, `modified`) VALUES (1, NULL, NULL, NULL, "", NULL, "Tipos de documento", "Tipos de documento de identidad Perú", NULL, NULL, "2016-03-22 00:00:00", NULL)');
    $this->execute('INSERT INTO `tablas` (`id`, `parent_id`, `tipo`, `valor`, `codigo`, `fecha`, `nombre`, `descripcion`, `lft`, `rght`, `created`, `modified`) VALUES (2, 1, NULL, NULL, "DNI", NULL, "Documento Nacional de Identidad", "", NULL, NULL, "2016-03-22 00:00:00", NULL)');
    $this->execute('INSERT INTO `tablas` (`id`, `parent_id`, `tipo`, `valor`, `codigo`, `fecha`, `nombre`, `descripcion`, `lft`, `rght`, `created`, `modified`) VALUES (3, 1, NULL, NULL, "LE", NULL, "Libreta Electoral", "", NULL, NULL, "2016-03-22 00:00:00", NULL)');
    $this->execute('INSERT INTO `tablas` (`id`, `parent_id`, `tipo`, `valor`, `codigo`, `fecha`, `nombre`, `descripcion`, `lft`, `rght`, `created`, `modified`) VALUES (4, 1, NULL, NULL, "LM", NULL, "Libreta Militar", "", NULL, NULL, "2016-03-22 00:00:00", NULL)');
    $this->execute('INSERT INTO `tablas` (`id`, `parent_id`, `tipo`, `valor`, `codigo`, `fecha`, `nombre`, `descripcion`, `lft`, `rght`, `created`, `modified`) VALUES (5, 1, NULL, NULL, "PAS", NULL, "Pasaporte", "", NULL, NULL, "2016-03-22 00:00:00", NULL)');
    $this->execute('INSERT INTO `tablas` (`id`, `parent_id`, `tipo`, `valor`, `codigo`, `fecha`, `nombre`, `descripcion`, `lft`, `rght`, `created`, `modified`) VALUES (6, NULL, NULL, NULL, NULL, NULL, "Roles", "Roles de usuario del Sistema", NULL, NULL, "2016-03-22 00:00:00", NULL)');
    $this->execute('INSERT INTO `tablas` (`id`, `parent_id`, `tipo`, `valor`, `codigo`, `fecha`, `nombre`, `descripcion`, `lft`, `rght`, `created`, `modified`) VALUES (7, 6, NULL, NULL, "admin", NULL, "Administrador", "Administrador del Sistema", NULL, NULL, "2016-03-22 00:00:00", NULL)');
    $this->execute('INSERT INTO `tablas` (`id`, `parent_id`, `tipo`, `valor`, `codigo`, `fecha`, `nombre`, `descripcion`, `lft`, `rght`, `created`, `modified`) VALUES (8, 6, NULL, NULL, "user", NULL, "Usuario", "Usuario comun del Sistema", NULL, NULL, "2016-03-22 00:00:00", NULL)');    

    }
    
    public function down()
    {
        $this->dropTable('personas');
        $this->dropTable('rolusers');
        $this->dropTable('tablas');
        $this->dropTable('users');
    }
}
