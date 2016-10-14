<?php
/**
 * Created by PhpStorm.
 * User: Isma
 * Date: 12/10/2016
 * Time: 09:54
 */

namespace Blog\BadgeBundle\Command;




use Blog\BadgeBundle\Entity\Badge;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableCell;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class BadgeListCommand extends ContainerAwareCommand
{
    const DEFAULT_NB_BADGES = 3;

    protected function configure()
    {
        $this
            // the name of the command (the part after "app/console")
            ->setName('badge:list')
            ->addOption('count',
                null,
                InputOption::VALUE_REQUIRED,
                'Nombre maximum de badges à afficher',
                self::DEFAULT_NB_BADGES
            )
            ->addOption('force',
                'f',
                InputOption::VALUE_NONE,
                'Forcer l\'affichage de Tous les badges'
            )

            // the short description shown while running "php app/console list"
            ->setDescription('List des badge connu')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp("This command allows you to view badge...")

            // configure an argument
            //->addArgument('name', InputArgument::REQUIRED, 'The name of the badge.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            '<info>List de Badge</info>' . PHP_EOL,
            '============',
            '',
        ]);

        $doctrine = $this->getContainer()->get('doctrine');
        $repository = $doctrine->getRepository('BlogBadgeBundle:Badge');

        /** @var EntityManager $entityManager */
        $entityManager = $doctrine->getManager();

        $query = $entityManager
            ->createQuery('SELECT b.id, b.name, b.description, b.createdAt FROM BlogBadgeBundle:Badge b');

        $query2 = $entityManager
            ->createQuery('SELECT b.id, b.name, b.description, b.createdAt, u.firstname, ub.optentionedAt
                           FROM BlogBadgeBundle:Badge b 
                           INNER JOIN b.userBadges ub
                           INNER JOIN ub.user u
                           ');

        dump($query2->getResult());

        if ($input->getOption('force')) {
            //$badges = $repository->findAll();
            $badges = $query2->getResult();
        } else {
            //$badges = $repository->findBy([], null, (int) $input->getOption('count'));
            $badges = $query2
                ->setMaxResults((int) $input->getOption('count'))
                ->getResult();
        }



        $formatter = $this->getHelper('formatter');

        if (!$badges) {
            $errorMessages = array('Error!', 'ya rien mec');
            $formattedBlock = $formatter->formatBlock($errorMessages, 'error');
             return $output->writeln($formattedBlock);
        }

        $table = new Table($output);

        $table
            ->setHeaders(array(
                array(new TableCell('List view badge', array('colspan' => 3))),
                array('NAME', 'Description', 'CreatedAt', 'Firstname', 'optentionedAt')
            ));

        foreach ($badges as $badge) {
            $table->addRows(array(
                    array($badge['name'], $badge['description'], $badge['createdAt'], $badge['firstname'], $badge['optentionedAt']->format('y-m-d')),
                    new TableSeparator(),
                ));
        }

        $table->addRow(
            array(new TableCell('<info>Whoa!!, il ya ' . count($badges) . '</info>', array('colspan' => 3)))
        );

        $formattedLine = $formatter->formatSection(
            'list badge',
            $input->getOption('count')
        );
        $output->writeln($formattedLine);

        $table->render($output);

    }
}