export class Indicado {
  id: string;
  nome: string;
  cpf: string;
  telefone: string;
  email: string;
  status_indicacao: number;
  desc_status: string = '';

  constructor(
    nome: string,
    id: string,
    cpf: string,
    telefone: string,
    status_indicacao: number,
    email: string,
    desc_status: string
  ) {
    this.id = id;
    this.nome = nome;
    this.cpf = cpf;
    this.telefone = telefone;
    this.email = email;
    this.status_indicacao = status_indicacao;
    this.desc_status = desc_status;
  }
}
