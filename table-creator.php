<?php

// todo: refactor; move build function to table class

class TableCreator {

    private Table $table;

    public function __construct() {
        $this->table = new Table();
        return $this;
    }

    public function load(array $contents, array $options = array()): TableCreator {
        $this->verifyContents($contents);
        $this->table->setContents($contents);
        $this->options($options);

        return $this;
    }

    public function create(): void {
        $this->table->build();
        $this->table->render();
    }

    public function getTable(): Table
    {
        return $this->table; 
    }

    private function verifyContents(array $contents) {

        // If empty
        if(array() === $contents){
            trigger_error('TableCreator Error: supplied an empty array as contents');
        }

        foreach($contents as $content){
            // If not an array of arrays
            if( !is_array($content) ){
                trigger_error('INVALID USE: Table_Creator supplied contents that was not an array of14
                 arrays');
            }
            // If not an array of associative arrays
            if(array_keys($content) === range(0, count($content) - 1)){
                trigger_error('INVALID USE: Table_Creator supplied contents that was not an array of associative arrays');
            }
        }

    }

    private function options(array $options) {

        $id = isset($options['id'])
            ? " id='" . $options['id'] . "' "
            : '';

        $class = isset($options['class'])
            ? " class='" . $options['class'] . "' "
            : '';

        $this->table->setOptions([
            "id" => $id,
            "class" => $class
        ]);

    }

}

class Table {

    public array $contents;
    public array $options;

    private string $html;

    public function setContents(array $contents): void
    {
        $this->contents = $contents;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options): void
    {
        $this->options = $options;
    }

    public function render(): void {
        echo $this->html;
    }

    /**
     * @param string $html
     */
    public function setHtml(string $html): void
    {
        $this->html = $html;
    }

    /**
     * @return string
     */
    public function getHtml(): string
    {
        return $this->html;
    }

    public function build() {

        if ( empty($this->contents) ){
            return 'no contents';
        }

        $id = $this->options['id'] ?? '';
        $class = $this->options['class'] ?? '';

        $html = "<table$id$class>";

        $heading = 0;

        foreach($this->contents as $content){

            if ( $heading === 0 ) {
                $html .= "<tr>";
                foreach ( array_keys( $content ) as $heading_item ) {
                    $heading_item = str_replace( '_', ' ', $heading_item );
                    $html .= "<th>$heading_item</th>";
                }
                $html .=  "</tr>";
                $heading ++;
            }

            $html .= "<tr>";

            foreach ( $content as $item ) {
                $html .= "<td>$item</td>";
            }

            $html .= '</tr>';

        }

        $html .= '</table>';

        $this->setHtml($html);

        return $this;

    }

}