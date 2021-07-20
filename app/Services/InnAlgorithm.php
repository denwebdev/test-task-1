<?php

declare(strict_types=1);

namespace App\Services;

class InnAlgorithm implements InnAlgorithmInterface
{
    public function checkDecimal(string $inn): bool
    {
        $innValues = str_split($inn);

        $weights = $this->getDecimalWeightTable();

        $sum = $this->getSum(array_slice($innValues, 0, 10), $weights);

        return end($innValues) === $this->getResidue($sum);
    }

    public function checkTwelve(string $inn): bool
    {
        $innValues = str_split($inn);

        $weights1 = $this->getTwelveWeightFirstStepTable();

        $sum1 = $this->getSum(array_slice($innValues,0, 10), $weights1);

        $weights2 = $this->getTwelveWeightSecondStepTable();

        $sum2 = $this->getSum(array_slice($innValues, 0, 11), $weights2);

        return (int)end($innValues) === $this->getResidue($sum2)
            && (int)prev($innValues) === $this->getResidue($sum1);
    }

    private function getSum(array $innValues, array $weights): int
    {
        $sum = 0;

        $i = 0;

        foreach ($weights as $weight) {
            $sum += $innValues[$i++] * $weight;
        }

        return $sum;
    }

    private function getDecimalWeightTable(): array
    {
        return [2, 4, 10, 3, 5, 9, 4, 6, 8];
    }

    private function getTwelveWeightFirstStepTable(): array
    {
        return [7, ...$this->getDecimalWeightTable()];
    }

    private function getTwelveWeightSecondStepTable(): array
    {
        return [3, ...$this->getTwelveWeightFirstStepTable()];
    }

    private function getResidue(int $sum): int
    {
        $residue = $sum % 11;

        if ($residue === 10) {
            return 0;
        }

        return $residue;
    }
}
