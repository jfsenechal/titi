<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('quantity', IntegerType::class, [

            ])
            ->add('content')
            ->add('content')
            ->add('category', CategoryType::class);

            /*->add('category', EntityType::class, [
                'class' => Category::class,
                'placeholder' => 'Sélecitonnez',
                'query_builder' => fn(CategoryRepository $categoryRepository) => $categoryRepository->qbPerso(),
            ]);*/
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
