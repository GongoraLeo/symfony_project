<?php

namespace App\Controller\Admin;

use App\Entity\Tareas;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;

class TareasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tareas::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addColumn(8),
            IdField::new('id')->hideOnForm(),
            TextField::new('Titulo'),
            TextField::new('Descripcion'),
            DateTimeField::new('Fecha'),

            FormField::addColumn(4),
            AssociationField::new('categoria')->setLabel('Categoría'),
            AssociationField::new('usuario')->setLabel('Usuario'),

        ];
    }    
    
}
