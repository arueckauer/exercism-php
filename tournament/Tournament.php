<?php

declare(strict_types=1);

class Tournament
{
    private TeamCollection $teams;

    private const LINE_SEPARATOR = '\n';
    private const HEADER         = 'Team                           | MP |  W |  D |  L |  P';

    public function __construct()
    {
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

class TeamCollection
{
    /** @var Team[] */
    private array $teams = [];

    public function get(string $teamName): Team
    {
        if (! isset($this->teams[$teamName])) {
            $this->teams[$teamName] = new Team($teamName);
        }

        return $this->teams[$teamName];
    }

    public function all(): array
    {
        $teams = $this->teams;

        usort($teams, static function (Team $teamA, Team $teamB) {
            $pointsDifference = $teamB->points() <=> $teamA->points();

            if (0 !== $pointsDifference) {
                return $pointsDifference;
            }

            return $teamA->name <=> $teamB->name;
        });

        return $teams;
    }
}

class Team
{
    public string $name;
    private int $matchesPlayed = 0;
    private int $matchesWon    = 0;
    private int $matchesDrawn  = 0;
    private int $matchesLost   = 0;
    private int $points        = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function play(): void
    {
        ++$this->matchesPlayed;
    }

    public function win(): void
    {
        ++$this->matchesWon;
        $this->points += 3;
    }

    public function draw(): void
    {
        ++$this->matchesDrawn;
        ++$this->points;
    }

    public function loose(): void
    {
        ++$this->matchesLost;
    }

    public function points(): int
    {
        return $this->points;
    }

    public function toString(): string
    {
        return sprintf(
            '%-30s | %2s | %2s | %2s | %2s | %2s',
            $this->name,
            $this->matchesPlayed,
            $this->matchesWon,
            $this->matchesDrawn,
            $this->matchesLost,
            $this->points
        );
    }
}
