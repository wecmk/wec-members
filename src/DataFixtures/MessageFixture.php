<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MessageFixture extends Fixture implements \Doctrine\Bundle\FixturesBundle\FixtureGroupInterface
{
    public function load(ObjectManager $manager)
    {
        $seriesColossians = new \App\Entity\Series();
        $seriesColossians->setName("Colossians");
        $manager->persist($seriesColossians);
        
        $seriesUncategorised = new \App\Entity\Series();
        $seriesUncategorised->setName("Uncategorised");
        $manager->persist($seriesUncategorised);
        
        $seriesHebrews = new \App\Entity\Series();
        $seriesHebrews->setName("Hebrews");
        $manager->persist($seriesHebrews);
       
        $speakerAllan = new \App\Entity\Speaker();
        $speakerAllan->setName("Allan Huxtable");
        $manager->persist($speakerAllan);
        
        $SpeakerRoger = new \App\Entity\Speaker();
        $SpeakerRoger->setName("Roger March");
        $manager->persist($SpeakerRoger);
        
        $sermon = new \App\Entity\Sermon();
        $sermon->setDate(new \DateTime());
        $sermon->setApm("AM");
        $sermon->addSeries($seriesColossians);
        $sermon->setReading("Colossians 1 v. 1 - 23");
        $sermon->setSecondReading("");
        $sermon->setTitle("");
        $sermon->setSpeaker($speakerAllan);
        $sermon->setCorrupt(false);
        $sermon->setIsPublic(true);
        $sermon->setTags("");
        $sermon->setPublicComments("");
        $sermon->setPrivateComments("");
        $manager->persist($sermon);

        $sermon = new \App\Entity\Sermon();
        $sermon->setDate(new \DateTime());
        $sermon->setApm("PM");
        $sermon->addSeries($seriesHebrews);
        $sermon->setReading("Hebrews 2 v.1 - 4");
        $sermon->setSecondReading("");
        $sermon->setTitle("'Must pay more attention'");
        $sermon->setSpeaker($speakerAllan);
        $sermon->setCorrupt(false);
        $sermon->setIsPublic(true);
        $sermon->setTags("");
        $sermon->setPublicComments("");
        $sermon->setPrivateComments("");
        $manager->persist($sermon);

        $sermon = new \App\Entity\Sermon();
        $sermon->setDate(new \DateTime());
        $sermon->setApm("AM");
        $sermon->addSeries($seriesUncategorised);
        $sermon->setReading("Psalm 119 v. 89 - 106");
        $sermon->setSecondReading("");
        $sermon->setTitle("A lesson from the reformation");
        $sermon->setSpeaker($SpeakerRoger);
        $sermon->setCorrupt(false);
        $sermon->setIsPublic(true);
        $sermon->setTags("");
        $sermon->setPublicComments("");
        $sermon->setPrivateComments("");
        $manager->persist($sermon);
        
        $manager->flush();
    }
    
    public static function getGroups(): array
    {
        return ['dev', 'test'];
    }
}
