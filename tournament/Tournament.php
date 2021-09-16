<?php

declare(strict_types=1);

class Tournament
{
    private TeamCollection $teams;

    private const LINE_SEPARATOR = '\n';
    private const HEADER         = 'Team                           | MP |  W |  D |  L |  P';

    public function __construct()
    {
        require_once 'Team.php';
        require_once 'TeamCollection.php';

        $this->teams = new TeamCollection();
    }

    public function tally(string $scores): string
    {
        if ('' === $scores) {
            return self::HEADER;
        }

        foreach (explode(self::LINE_SEPARATOR, $scores) as $score) {
            $this->recordResult($score);
        }

        $teams = [self::HEADER];
        foreach ($this->teams->all() as $team) {
            $teams[] = $team->toString();
        }

        return implode(self::LINE_SEPARATOR, $teams);
    }

    private function recordResult(string $score): void
    {
        [$teamNameA, $teamNameB, $result] = explode(';', $score);

        $teamA = $this->teams->get($teamNameA);
        $teamA->play();

        $teamB = $this->teams->get($teamNameB);
        $teamB->play();

        switch ($result) {
            case 'win':
                $teamA->win();
                $teamB->loose();
                break;

            case 'draw':
                $teamA->draw();
                $teamB->draw();
                break;

            case 'loss':
                $teamA->loose();
                $teamB->win();
                break;
        }
    }
}
