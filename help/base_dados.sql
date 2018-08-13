/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  gustavocastrohs
 * Created: 26/08/2016
 */


INSERT IGNORE INTO `tb_menu` VALUES(1, NULL, 2, 1, 'Inicio', '#', NULL, NULL, NULL, NULL, NULL, 1);
INSERT IGNORE INTO `tb_menu` VALUES(2, NULL, 2, 1, 'Financeiro', '#', NULL, 'glyphicon glyphicon-stats', 'color:green', NULL, 'caret', 999);
INSERT IGNORE INTO `tb_menu` VALUES(3, 2, 2, NULL, 'Receitas', 'Receita', 'color:green', 'glyphicon glyphicon-arrow-down', NULL, NULL, NULL, 2);
INSERT IGNORE INTO `tb_menu` VALUES(4, 2, 2, 1, 'Despesas', 'Despesa', 'color:red', 'glyphicon glyphicon-arrow-up', NULL, NULL, NULL, 1);


INSERT IGNORE INTO `tb_menu` VALUES(7, NULL, 2, 1, 'Cadastros', '#', NULL, NULL, NULL, NULL, 'caret', 999);
INSERT IGNORE INTO `tb_menu` VALUES(5, 7, 2, 1, 'Produtos', 'Produto', NULL, NULL, NULL, NULL, NULL, 999);
INSERT IGNORE INTO `tb_menu` VALUES(6, 7, 2, 1, 'Clientes', 'Cliente', NULL, NULL, NULL, NULL, NULL, 999);
INSERT IGNORE INTO `tb_menu` VALUES(8, 7, 2, 1, 'Categoria Produto', 'CategoriaProduto', NULL, NULL, NULL, NULL, NULL, 999);

INSERT IGNORE INTO `tb_menu` VALUES(12, NULL, 3, 1, 'Venda', '#', NULL, NULL, 'color:blue', NULL, 'caret', 999);
INSERT IGNORE INTO `tb_menu` VALUES(13, 7, 2, 1, 'Fornecedores', 'Fornecedor', NULL, NULL, NULL, NULL, NULL, 999);
INSERT IGNORE INTO `tb_menu` VALUES(14, NULL, 1, 1, 'Administração', '#', NULL, NULL, 'color:rgb(255, 159, 52)', NULL, 'caret', 999);
INSERT IGNORE INTO `tb_menu` VALUES(9, 14, 1, 1, 'Menus', 'Menu', NULL, NULL, NULL, NULL, NULL, 999);
INSERT IGNORE INTO `tb_menu` VALUES(15, 7, 2, 1, 'Grupo de Acesso', 'Nivel_acesso', NULL, NULL, NULL, NULL, NULL, 999);
INSERT IGNORE INTO `tb_menu` VALUES(18, 14, 1, NULL, 'Usuários', 'Usuario', NULL, NULL, NULL, NULL, NULL, 999);
INSERT IGNORE INTO `tb_menu` VALUES(19, 12, 3, NULL, 'Histórico de Vendas', '#', NULL, NULL, NULL, NULL, NULL, 999);
INSERT IGNORE INTO `tb_menu` VALUES(20, 12, 2, NULL, 'Nova Venda', '#', NULL, NULL, NULL, NULL, NULL, 1);
INSERT IGNORE INTO `tb_menu` VALUES(21, 2, 2, NULL, 'Fluxo de Caixa', '#', 'color:#20B2AA', 'glyphicon glyphicon-transfer', NULL, NULL, NULL, 999);

--
-- Extraindo dados da tabela `tb_nivel_acesso`
--

INSERT INTO `tb_nivel_acesso` VALUES(1, 'Master');
INSERT INTO `tb_nivel_acesso` VALUES(2, 'Administrador');
INSERT INTO `tb_nivel_acesso` VALUES(3, 'Usuário');

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` VALUES(1, NULL, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1);
INSERT INTO `tb_usuario` VALUES(2, NULL, 'gustavo', '202cb962ac59075b964b07152d234b70', 2, 1);
