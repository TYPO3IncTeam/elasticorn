<?php
declare(strict_types = 1);
namespace T3G\Elasticorn\Commands\Mapping;


use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use T3G\Elasticorn\Commands\BaseCommand;

/**
 * @package T3G\Elasticorn\Commands
 */
class CompareCommand extends BaseCommand
{
    /**
     * Configure the init command
     *
     * @return void
     */
    protected function configure()
    {
        parent::configure();
        $this
            ->setName('mapping:compare')
            ->setDescription('compare mapping configuration to applied configuration.');

        $this->
            addArgument('indexName', InputArgument::REQUIRED, 'The index name.');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);
        $this->indexUtility->compareMappingConfiguration($input->getArgument('indexName'));
    }

}