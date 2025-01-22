<?php

namespace App\Controller\Admin;

use App\Entity\Tareas;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class TareasCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tareas::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('Titulo'),
            TextField::new('Descripcion'),
            DateTimeField::new('Fecha'),
            AssociationField::new('categoria')->setLabel('Categoría'),
            AssociationField::new('usuario')->setLabel('Usuario'),

        ];
    }
    
}
