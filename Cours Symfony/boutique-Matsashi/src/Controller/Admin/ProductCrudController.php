<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name',"Nom"),
            SlugField::new('slug',"Slug")->setTargetFieldName("name"),
            TextField::new('subtitle',"Sous-titre"),
            ImageField::new('image',"Image")->setFormType(FileUploadType::class)
                ->setBasePath('assets/Images/uploads/')
                ->setUploadDir("public/assets/Images/uploads")
                ->setUploadedFileNamePattern("[randomhash].[extension]")
                ->setRequired(false),
            TextareaField::new('description', "Description"),
            MoneyField::new('price',"Prix")->setCurrency(('EUR')),
            AssociationField::new('Id_category',"Catégorie")
        ];
    }
}
