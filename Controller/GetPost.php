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

    public function postProcess(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if(isset($_POST["firstNumber"]) && isset($_POST["secondNumber"]))
            {
                $this->setNumbers(intval($_POST["firstNumber"]), intval($_POST["secondNumber"]));
                $this->calculateSum();
            } else
            {
                $this->handleBadRequest();
            }
        }
    }

    private function calculateSum () : void
    {
        $sum = $this->getFirstNumber() + $this->getSecondNumber();
        echo "Сума введених чисел:" . $sum;
        echo "<br/>" . "Method Post";
    }
    private function handleBadRequest(): void
    {
        http_response_code(400);
        echo "Number or numbers was not set";
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
    public function setNumbers(int $firstNumber,int $secondNumber): void
    {
            $this->firstNumber = $firstNumber;
            $this->secondNumber = $secondNumber;
    }


}