<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;


class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'attr'=>[
                    'class'=>'form-control',
                    'minLength'=>2,
                    'maxLength'=>50,
                ],
                'label'=>'Adresse e-mail',
                'label_attr'=>[
                    'class'=>'form-label',
                ],
                'constraints'=>[
                    new Assert\NotBlank(),
                    new Assert\Email(),
                    new Assert\Length(['min'=>2,'max'=>50,]),
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label'=> 'Accepter les termes',
                'constraints' => [
                    new IsTrue([
                        'message' => 'Voulez-vous accepter les termes ?',
                    ]),
                ],
            ])
            ->add('plainPassword', RepeatedType::class,[
                'type'=> PasswordType::class,
                    'first_options'=>[
                        'attr'=>[
                            'class'=>'form-control'
                        ],
                        'label'=>'Mot de passe',
                        'label_attr'=>[
                            'class'=> 'form-label'
                        ],
                    ],
                    'second_options'=>[
                        'attr'=>[
                            'class'=>'form-control'
                        ],
                        'label'=>"Confirmation de votre mot de passe",
                        'label_attr'=>[
                            'class'=>'form-label'
                        ],
                    ],
                    'invalid_message'=>"The passwords do not match"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
