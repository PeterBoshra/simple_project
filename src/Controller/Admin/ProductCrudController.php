<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\Recipient;

class ProductCrudController extends AbstractCrudController
{

    private $notifier;

    public function __construct(NotifierInterface $notifier)
    {
        $this->notifier = $notifier;
    }

    public static function getEntityFqcn(): string
    {
        return Product::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextEditorField::new('description'),
            IntegerField::new('price'),
            AssociationField::new('currency'),
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $product): void
    {
        $entityManager->persist($product);
        $entityManager->flush();

        $notification = (new Notification('New Product', ['email']))
            ->content('New Product Added'. $product->getName());

        // The receiver of the Notification
        $recipient = new Recipient(
            'peter.boshra4@gmail.com',
            '+201220896536'
        );

        // Send the notification to the recipient
        $this->notifier->send($notification, $recipient);

    }

}
