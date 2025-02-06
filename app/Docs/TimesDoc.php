<?php

namespace App\Docs;

/**
 * @OA\Tag(
 *     name="Times",
 *     description="Endpoints relacionados aos times do campeonato"
 */

/**
 * @OA\Get(
 *     path="/api/times",
 *     summary="Listar todos os times",
 *     tags={"Times"},
 *     @OA\Response(
 *         response=200,
 *         description="Lista de times",
 *         @OA\JsonContent(
 *             type="array",
 *             @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="nome", type="string", example="Time Exemplo"),
 *                 @OA\Property(property="data_inscricao", type="string", format="date-time", example="2024-02-01T00:00:00Z"),
 *                 @OA\Property(property="pontos", type="integer", example=10)
 *             )
 *         )
 *     )
 * )
 */

/**
 * @OA\Post(
 *     path="/api/times",
 *     summary="Cadastrar um novo time",
 *     tags={"Times"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"nome"},
 *             @OA\Property(property="nome", type="string", example="Time Novo")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Time criado com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="nome", type="string", example="Time Novo"),
 *             @OA\Property(property="data_inscricao", type="string", format="date-time", example="2024-02-01T00:00:00Z"),
 *             @OA\Property(property="pontos", type="integer", example=0)
 *         )
 *     )
 * )
 */

/**
 * @OA\Get(
 *     path="/api/times/{id}",
 *     summary="Buscar um time específico",
 *     tags={"Times"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Detalhes do time",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="nome", type="string", example="Time Exemplo"),
 *             @OA\Property(property="data_inscricao", type="string", format="date-time", example="2024-02-01T00:00:00Z"),
 *             @OA\Property(property="pontos", type="integer", example=10)
 *         )
 *     )
 * )
 */

/**
 * @OA\Put(
 *     path="/api/times/{id}",
 *     summary="Atualizar um time",
 *     tags={"Times"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"nome"},
 *             @OA\Property(property="nome", type="string", example="Time Atualizado")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Time atualizado com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="nome", type="string", example="Time Atualizado"),
 *             @OA\Property(property="data_inscricao", type="string", format="date-time", example="2024-02-01T00:00:00Z"),
 *             @OA\Property(property="pontos", type="integer", example=12)
 *         )
 *     )
 * )
 */

/**
 * @OA\Delete(
 *     path="/api/times/{id}",
 *     summary="Deletar um time",
 *     tags={"Times"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Time deletado com sucesso",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Time deletado com sucesso")
 *         )
 *     )
 * )
 */
class TimesDoc {}
