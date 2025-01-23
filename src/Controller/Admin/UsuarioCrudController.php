<?php

namespace App\Controller\Admin;

use App\Entity\Usuario;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

#[AdminDashboard(routes:[
    'index' => ['routePath' => 'admin'],
    'detail' => ['routePath' => 'admin/usuario/{usuario}'],
    'new' => ['routePath' => 'admin/usuario/new'],
    'edit' => ['routePath' => 'admin/usuario/{usuario}/edit'],
])]
class UsuarioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Usuario::class;
    }


    public function configureCrud (Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Usuario')
            ->setEntityLabelInPlural('Usuarios')
            ->setSearchFields(['id', 'nombre', 'email', 'password'])
            ->setDefaultSort(['id' => 'DESC']);
    }
    







    
    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addColumn(4),
            FormField::addFieldset('Datos del usuario')->setIcon('fa fa-user'),
            IdField::new('id')->hideOnForm(),
            TextField::new('nombre'),
            IntegerField::new('edad'),
            TextField::new('nickname'),

            FormField::addColumn(8),
            FormField::addFieldset('Informacion adicional'),
            TextareaField::new('biografia'),

        ];
    }
    
}
