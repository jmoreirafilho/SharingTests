## SharingTests ##
### Descrição ###
- Aplicação pública de envio/exibição de arquivos de texto

### Funcionalidades ###
- Cadastro de professores
 - CRUD
 - O professor deverá ser cadastrado a partir de um `cadastro/upload de material`
 - Deve ser cadastrado o nome do professor

- Cadastro de grupo de professores
 - Deve ser cadastrado o id do professor e o id da instituição

- Cadastro de instituições
 - CRUD
 - A instituição deverá ser cadastrada a partir de um `cadastro/upload de material`
 - Deve ser cadastrado o nome da instituição, a sigla da instituição, cidade e estado e o id do grupo de professores
 
- Cadastro/Upload de material
 - CRUD
 - Deve listar os professores e as insituições, mas também dar opção de cadastrar novos (typeahead)
 - Deve ser cadastrado o id do curso, a data de envio, o id da insituição e professor e o caminho do arquivo

### Esquema ###
Um usuário, ao fazer o upload do material, deve declarar o nome do curso, o nome do professor, a data e a instituição de ensino desse material, além de um titulo para o arquivo. Com essas informações é possivel fazer o upload do material para o sistema e deixa-lo acessivel para outros usuários. O responsável pela publicação do material pode setar outras informações para que fique mais fácil filtrar/buscar outros materias, como Cidade, Estado, etc...

Um usuário, ao buscar algum material, deve primeiro selecionar seu curso e assim terá uma lista com os materiais desse curso no sistema. Haverão também outros filtros, como: Instituição, Cidade, etc...
