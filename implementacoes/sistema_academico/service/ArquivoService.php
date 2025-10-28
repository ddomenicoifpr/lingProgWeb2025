<?php 
require_once(__DIR__ . "/../util/config.php");

class ArquivoService {

    public function salvarArquivo(array $arquivo) {
        //Captura o nome e a extensão do arquivo
        $arquivoNome = explode('.', $arquivo['name']);
        $arquivoExtensao = $arquivoNome[count($arquivoNome)-1];
        
        //A partir da extensão, o ideal é gerar um nome único para o arquivo
        //Exemplo: pode-se concatenar um identificador único do tipo UUID
        $nomeUnico = uniqid('arquivo_');
        $nomeArquivoSalvar = $nomeUnico . "." . $arquivoExtensao;

        //Salva a foto no diretorio de arquivos
        if(move_uploaded_file($arquivo["tmp_name"], 
                            DIR_ARQUIVOS. "/" . $nomeArquivoSalvar)) { 
            //Se salvou, retorna o nome do arquivo
            return $nomeArquivoSalvar;
        }

        return null; //Não salvou, então retorna nulo
    }

    public function removerArquivo($nomeArquivo) {
        $caminhoArquivo = DIR_ARQUIVOS . "/" . $nomeArquivo;

        if(file_exists($caminhoArquivo))
            unlink($caminhoArquivo);
    }

}