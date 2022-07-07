<?php
namespace Console\App\Commands;
use Console\App\Helpers\SaveToCsv;

 
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
 
class Payroll extends Command
{
    // date_default_timezone_set('GMT'); // set local time zone to Eastern Standard Time
    // $time = new DateTime('now', 'Europe/London');

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
        $output->writeln('The CSV file is geenerated successfully: '. $fileName); 


        $dt = new \DateTime();

        for ($i = 0; $i < 12; $i++) {
            
            $month = $dt->format('Y-m-d');

            // Get last day of the the given month 
            $last_date = date("Y-m-t", strtotime($month));

            // Check if last day of the month is weekend
            if($this->isWeekend($last_date) == "saturday"){
                    $last_date = date('Y-m-d', strtotime($last_date .' -1 day'));

            }elseif($this->isWeekend($last_date) == "sunday"){
                    $last_date = date('Y-m-d', strtotime($last_date .' -2 day'));

            }else {
                    $last_date = $last_date;
            }

                // get the 10th day of this month
                $tenth_date =  date('Y-m-d', strtotime('+9 days', strtotime('first day of this month', strtotime($month))));

                // Check if 10th day of the month is weekend
            if($this->isWeekend($tenth_date) == "saturday"){
                    $adjusted_tenth_date = date('Y-m-d', strtotime($tenth_date .' +2 day'));

            }elseif($this->isWeekend($tenth_date) == "sunday"){
                $adjusted_tenth_date = date('Y-m-d', strtotime($tenth_date .' +1 day'));

            }else {
                    $adjusted_tenth_date = $tenth_date;
            }


            // stores the pay dates
            $year = date('Y', strtotime($last_date));
            $month = date('F', strtotime($last_date));
            $monthYear = $month . '/' . $year; 



            $data[] = array(1 => $monthYear, 2=> $last_date, 3 => $adjusted_tenth_date);
            // $dataa[] = array("name"=> $adjusted_tenth_date);


            $dt->modify('+1 month');
            
        }

        
        // Write result to CSV fuke.
        SaveToCsv::save($data, $fileName);


        return Command::SUCCESS;


    }


    private function isWeekend($last_date)
    {

        $weekday= date("l", strtotime($last_date) );
        $normalized_weekday = strtolower($weekday);
    
        if ($normalized_weekday == "saturday") {
            return $normalized_weekday; 
        } elseif ($normalized_weekday == "sunday") {
            return $normalized_weekday; 
        }

    }
}