CREATE TABLE IF NOT EXISTS `aluno` (
  `aluno_id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) NOT NULL,
  `nomeAluno` varchar(100) NOT NULL,
  `ocupacao` varchar(32) NOT NULL,
  `crefito` varchar(10) NOT NULL,
  PRIMARY KEY (`aluno_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`aluno_id`, `cpf`, `nomeAluno`, `ocupacao`, `crefito`) VALUES
(1, '018.637.221-30', 'GABRIEL OLIVEIRA SILVA DE SOUSA', 'fisioterapia', 'CREFITO-3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `curso_id` int(4) NOT NULL AUTO_INCREMENT,
  `nomeCurso` varchar(100) NOT NULL,
  `anoCurso` year(4) NOT NULL,
  `cargaHoraria` int(11) NOT NULL,
  `professor` varchar(100) NOT NULL,
  `registro` varchar(4) NOT NULL,
  PRIMARY KEY (`curso_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`curso_id`, `nomeCurso`, `anoCurso`, `cargaHoraria`, `professor`, `registro`) VALUES
(4, 'SISTEMAS', 2016, 40, 'Edson', '0001'),
(5, 'Acunputura', 2016, 123, 'Pedro', '0002');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matricula`
--

CREATE TABLE IF NOT EXISTS `matricula` (
  `matricula_id` int(11) NOT NULL AUTO_INCREMENT,
  `aluno_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `numeroCertificado` varchar(14) NOT NULL,
  `status` varchar(9) NOT NULL,
  PRIMARY KEY (`matricula_id`),
  KEY `aluno_id` (`aluno_id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `matricula`
--

INSERT INTO `matricula` (`matricula_id`, `aluno_id`, `turma_id`, `numeroCertificado`, `status`) VALUES
(1, 1, 5, '00000000000002', 'aprovado'),
(2, 1, 5, '00000000000002', 'aprovado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE IF NOT EXISTS `turma` (
  `turma_id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(4) NOT NULL,
  `numeroTurma` varchar(2) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataFinal` date NOT NULL,
  PRIMARY KEY (`turma_id`),
  KEY `curso_id` (`curso_id`),
  KEY `curso_id_2` (`curso_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`turma_id`, `curso_id`, `numeroTurma`, `dataInicio`, `dataFinal`) VALUES
(3, 4, '1', '0000-00-00', '0000-00-00'),
(4, 5, '4', '0000-00-00', '0000-00-00'),
(5, 5, '4', '0000-00-00', '0000-00-00'),
(6, 5, '4', '0000-00-00', '0000-00-00');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`turma_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`aluno_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `turma`
--
ALTER TABLE `turma`
  ADD CONSTRAINT `turma_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`curso_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
