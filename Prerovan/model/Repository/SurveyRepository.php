<?php

namespace Prerovan\Model\Repository;

class SurveyRepository extends BaseRepository
{
    public function ss()
    {
        $fluent = $this->createFluent()
            ->where('[survey_category.active] = %i', 1)
            ->leftJoin('survey_category')
            ->on('[survey_category.id] = [survey.survey_category_id]');
        $fluent = $fluent->fetchAll();
        return $this->createEntities($fluent);
    }
}