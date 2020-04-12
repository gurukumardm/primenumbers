<?php
class IsAPrimeNumber
{
    public $number;

    public function __construct()
    {
    }

    public function primeCheck($number)
    {
        if ($number == 1) {
            return 0;
        }

        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return 0;
            }
        }

        return 1;
    }
}
class primeNumbers
{
    public $maxval;
    public $primecheckobj;

    public function __construct($primecheck)
    {
        $this->primecheckobj = $primecheck;
    }

    public function getPrimeNumbers($maxval)
    {
        $pnumbers = [];
        if ($maxval > 1) {
            for ($i = 1; $i <= $maxval; $i++) {
                if ($this->primecheckobj->primeCheck($i)) {
                    $pnumbers[] = $i;
                }
            }
        }

        return $pnumbers;
    }
}

class multiplicationTable
{
    public function __construct()
    {
    }

    public function generateTable($primedata)
    {
        $tablesdata = [];
        if (count($primedata)) {
            foreach ($primedata as $curPrime) {
                foreach ($primedata as $multiplyPrime) {
                    $tablesdata[$curPrime][] = $curPrime * $multiplyPrime;
                }
            }
        }

        return $tablesdata;
    }
}

class ReturnViewData
{
    public function __construct()
    {
    }

    public function displayOutput($tablesdata)
    {
        $outputdata = '';
        if (count($tablesdata)) {
            $outputdata .= '<table border="1">';

            foreach ($tablesdata as $tabledata) {
                $outputdata .= '<tr>';

                foreach ($tabledata as $tabledatarow) {
                    $outputdata .= '<td>'.$tabledatarow.'</td>';
                }
                $outputdata .= '</tr>'; // close tr tag here
            }

            $outputdata .= '</table>';
        }

        return $outputdata;
    }
}
$primeNumbersObj = new primeNumbers(new IsAPrimeNumber());
$primeNumbers = $primeNumbersObj->getPrimeNumbers(30);

$mtable = new multiplicationTable();
$tabledata = $mtable->generateTable($primeNumbers);

$returnViewData = new ReturnViewData();
$outputdata = $returnViewData->displayOutput($tabledata);
echo $outputdata;
?>

