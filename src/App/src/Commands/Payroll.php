<?php
namespace Console\App\Commands;

 
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
 
class Payroll extends Command
{


    protected function configure()
    {
        $this->setName('Ali:csv')
            ->setDescription('Generates CVS file for Basic Salary and Salary Bonus for next 12 months')
            ->setHelp('Demonstration of custom commands created by Symfony Console component.')
            ->addArgument('outputFile', InputArgument::REQUIRED, 'Pass the output file name.');
    }
 
    protected function execute(InputInterface $input, OutputInterface $output)
    {        
        $fileName = $input->getArgument('outputFile');
        $fileName = $fileName . '.csv';
        $output->writeln('Entered CSV file name: '. $fileName); 


        


        return Command::SUCCESS;


    }


   
}