<?php


class GetPost
{
    private int $firstNumber;
    private int $secondNumber;

    public function getHello()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            echo "Hello mate, we have \"GET\" method";
        }

    }

    public function postSum() : void
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
                $this->setFirstNumber(intval($_POST["firstNumber"]));
                $this->setSecondNumber(intval($_POST["secondNumber"]));
                $sum = $this->getFirstNumber() + $this->getSecondNumber();
               echo "Сума введених чисел:" . $sum;
               echo "<br/>" . "Method Post";

        }
    }


    /**
     * @return int
     */
    public function getFirstNumber(): int
    {
        return $this->firstNumber;
    }

    /**
     * @return int
     */
    public function getSecondNumber(): int
    {
        return $this->secondNumber;
    }

    /**
     * @param int $firstNumber
     */
    public function setFirstNumber(int $firstNumber): void
    {
        if (isset($firstNumber))
        {
            $this->firstNumber = $firstNumber;
        }
        elseif (!isset($_POST["firstNumber"]))
        {
            http_response_code(400);
            $firstNumber = 0;
            echo "Number or numbers was not set . First number = $firstNumber";
        }

    }

    /**
     * @param int $secondNumber
     */
    public function setSecondNumber(int $secondNumber): void
    {
        if (isset($_POST['secondNumber']))
        {
            $this->secondNumber = $secondNumber;
        }
        else
        {
            http_response_code(400);
            echo "Number or numbers was not set";
        }
    }
}