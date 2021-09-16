<?php

declare(strict_types=1);

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
