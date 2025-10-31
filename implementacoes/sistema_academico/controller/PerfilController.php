<?php

require_once(__DIR__ . "/../service/PerfilService.php");
require_once(__DIR__ . "/../service/ArquivoService.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");

class PerfilController {

    private PerfilService $perfilService;
    private ArquivoService $arquivoService;
    private UsuarioDAO $usuarioDAO;

    public function __construct() {
        $this->perfilService = new PerfilService();
        $this->arquivoService = new ArquivoService();
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function atualizar(Usuario $usuario, array $foto) {
        $erros = $this->perfilService->validar($foto);

        if(! $erros) {
            //1- Salvar o arquivo em um diretório conhecido
            $nomeArquivo = $this->arquivoService->salvarArquivo($foto);
            if($nomeArquivo) {

                $fotoAnterior = $usuario->getImgPerfil();

                //2- Atualizar o registro do usuário no banco de dados
                $usuario->setImgPerfil($nomeArquivo);
                $erro = $this->usuarioDAO->alterar($usuario);
                if($erro) {
                    array_push($erros, "Erro ao salvar a foto de perfil!");
                    if(AMB_DEV)
                        array_push($erros, $erro->getMessage());
                } else {
                    //Remover o arquivo da foto anterior caso exista
                    if($fotoAnterior)
                        $this->arquivoService->removerArquivo($fotoAnterior);
                }

            } else {
                array_push($erros, "Erro ao salvar o arquivo!");
            }
        }

        return $erros;
    }

}