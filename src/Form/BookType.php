<?php
namespace App\Form;

use App\Entity\Autor;
use App\Entity\Book;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('datePublished', null, [
                'widget' => 'single_text',
            ])
            // Remove dateCreated and dateUpdated from the form
           
            ->add('autors', EntityType::class, [
                'class' => Autor::class,  // Associe le champ à l'entité Autor
                'choice_label' => 'name', // Utilisez le bon nom de champ pour afficher le nom de l'auteur
                'placeholder' => 'Select an author',
                'multiple' => true, // Permet la sélection multiple
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
